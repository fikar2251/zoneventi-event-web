<?php

namespace App\Http\Controllers\Admin\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\Clubs;
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

    
    public function clubFollow(Request $request) {
        $clubId = $request->club_id;
        $club = Clubs::findOrFail($clubId);
        $currentUser = Auth::user();
        try {

            // if ($club->id == $clubId) {
            //     return (new ResponseResource(false, 'You cannot follow yourself', null))->response()->setStatusCode(400);
            // }

            if (!$currentUser->clubs()->where('club_id', $club->id)->exists()) {
                $currentUser->clubs()->attach($club->id);
            }else{
                return (new ResponseResource(false, 'Already Following Clubs', null))->response()->setStatusCode(400);
            }

            return new ResponseResource(true, 'Succes Following', $club);
        } catch (\Throwable $th) {
            return (new ResponseResource(false, $th->getMessage(), null))->response()->setStatusCode(500);
        }

    }

    public function clubUnfollow(Request $request) {
        $clubId = $request->club_id;
        $club = Clubs::findOrFail($clubId);
        $currentUser = Auth::user();
        try {

            // if ($club->id == $clubId) {
            //     return (new ResponseResource(false, 'You cannot follow yourself', null))->response()->setStatusCode(400);
            // }

            if ($currentUser->clubs()->where('club_id', $club->id)->exists()) {
                $currentUser->clubs()->detach($club->id);
            }else{
                return (new ResponseResource(false, 'Already Unfollowing Clubs', null))->response()->setStatusCode(400);
            }

            return new ResponseResource(true, 'Succes Unfollowing', $club);
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

    public function searchInFollowers(Request $request) {
        
        $term = $request->keyword;
        $userId = Auth::guard('api')->user()->id;
        $user = User::findOrFail($userId);
        try {
            if ($term != null) {
                $data =$user->followers()->where('name', 'like', '%'.$term.'%')->get();
            }else{
                $data = $user->followers()->get();
            }
            // $followers = $data->followers;
            // $followings = $data->followings;
            // $data->total_followers = $followers->count();
            // $data->total_following = $followings->count();
            
            return new ResponseResource('true', 'List Users', $data);
        } catch (\Throwable $th) {
            return (new ResponseResource('false', $th->getMessage(), null))->response()->setStatusCode(500);
        }
    }

    public function searchInFollowings(Request $request) {
        
        $term = $request->keyword;

        $userId = Auth::guard('api')->user()->id;
        $user = User::findOrFail($userId);
        try {
            if ($term != null) {
                $data =$user->followings()->with('getDetailMobUser')->where('name', 'like', '%'.$term.'%')->get();
            }else{
                $data = $user->followings()->with('getDetailMobUser')->get();
            }

            
            return new ResponseResource('true', 'List Users', $data);
        } catch (\Throwable $th) {
            return (new ResponseResource('false', $th->getMessage(), null))->response()->setStatusCode(500);
        }
    }

    public function searchInFollowingsClub(Request $request) {
        
        $term = $request->keyword;
        $longitude = $request->longitude;
        $latitude = $request->latitude;

        $radius = $request->input('radius', 10); // default radius 10 km


        $userId = Auth::guard('api')->user()->id;
        $user = User::findOrFail($userId);
        try {
            if ($term != null) {
                $userClubs =$user->clubs()->where('name', 'like', '%'.$term.'%')
                ->select('*')
                ->selectRaw("ROUND((6371 * acos(cos(radians(?)) 
                * cos(radians(latitude)) 
                * cos(radians(longitude) - radians(?)) 
                + sin(radians(?)) 
                * sin(radians(latitude)))), 2) AS distance", 
                [$latitude, $longitude, $latitude])
                ->having('distance', '<', $radius)
                ->orderBy('distance')
                ->where('status', 1)
                ->get();
            }else{
                $userClubs = $user->clubs()
                ->select('*')
                ->selectRaw("ROUND((6371 * acos(cos(radians(?)) 
                * cos(radians(latitude)) 
                * cos(radians(longitude) - radians(?)) 
                + sin(radians(?)) 
                * sin(radians(latitude)))), 2) AS distance", 
                [$latitude, $longitude, $latitude])
                ->having('distance', '<', $radius)
                ->orderBy('distance')
                ->where('status', 1)
                ->get();
            }

            
            return new ResponseResource('true', 'List Users', $userClubs);
        } catch (\Throwable $th) {
            return (new ResponseResource('false', $th->getMessage(), null))->response()->setStatusCode(500);
        }
    }
}
