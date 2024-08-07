<?php

namespace App\Http\Controllers\Admin\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\MobUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index() {
        try {
            $data = MobUsers::with('user')->get();
            return new ResponseResource(true, 'Users List', $data);
        } catch (\Throwable $th) {
            return (new ResponseResource(false, $th->getMessage(), null))->response()->setStatusCode(500);
        }
    }

    public function follow(Request $request) {
        $userId = $request->user_id;
        $user = User::findOrFail($userId);
        $currentUser = Auth::user();
        try {

            if ($currentUser->id == $userId) {
                return (new ResponseResource(false, 'You cannot follow yourself', null))->response()->setStatusCode(400);
            }

            if (!$currentUser->followings()->where('following_id', $user->id)->exists()) {
                $currentUser->followings()->attach($user->id);
            }

            return new ResponseResource(true, 'Succes Following', $currentUser);
        } catch (\Throwable $th) {
            return (new ResponseResource(false, $th->getMessage(), null))->response()->setStatusCode(500);
        }

    }

    public function unfollow(Request $request)  {
        $userId = $request->user_id;
        $user = User::findOrFail($userId);
        $currentUser = Auth::user();

        try {

            if ($currentUser->id == $userId) {
                return (new ResponseResource(false, 'You cannot unfollow yourself', null))->response()->setStatusCode(400);
            }

            if ($currentUser->followings()->where('following_id', $user->id)->exists()) {
                $currentUser->followings()->detach($user->id);
            }
            return new ResponseResource(true, 'Succes Unfollow', $currentUser);
        } catch (\Throwable $th) {
            return (new ResponseResource(false, $th->getMessage(), null))->response()->setStatusCode(500);
        }

    }

    public function listFollowers()  {
        try {
            $userId = request('id');
            if ($userId) {
                $user = User::with(['followers.getDetailMobUser', 'followings.getDetailMobUser'])->findOrFail($userId);
            }else{
                $user = User::with(['followers.getDetailMobUser', 'followings.getDetailMobUser'])->findOrFail(Auth::user()->id);
            }
            $followers = $user->followers;
            $followings = $user->followings;
            $user->total_followers = $followers->count();
            $user->total_following = $followings->count();
            return new ResponseResource(true, 'Succes', $user);
        } catch (\Throwable $th) {
            return (new ResponseResource(false, $th->getMessage(), null))->response()->setStatusCode(500);
        }
    }
}
