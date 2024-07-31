<?php

namespace App\Http\Controllers\Admin\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function follow($userId) {
        $user = User::findOrFail($userId);
        $currentUser = Auth::user();
        try {
            if (!$currentUser->followings()->where('following_id', $user->id)->exists()) {
                $currentUser->followings()->attach($user->id);
            }

            return new ResponseResource(true, 'Succes Following', $currentUser);
        } catch (\Throwable $th) {
            return (new ResponseResource(false, $th->getMessage(), null))->response()->setStatusCode(500);
        }

    }

    public function unfollow($userId)  {
        $user = User::findOrFail($userId);
        $currentUser = Auth::user();

        try {
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
                $user = User::findOrFail($userId);
            }else{
                $user = User::findOrFail(Auth::user()->id);
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
