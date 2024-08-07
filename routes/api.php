<?php

use App\Http\Controllers\Admin\API\v1\AuthController;
use App\Http\Controllers\Admin\API\v1\EventsController;
use App\Http\Controllers\Admin\API\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function() {
    Route::post('/login',[AuthController::class, 'login']); 
    Route::post('/register',[AuthController::class, 'register']); 
    Route::post('/register-google',[AuthController::class, 'registerGoogle']); 
    Route::post('/logout',[AuthController::class, 'logout']); 
    Route::middleware('jwt.verify')->get('/user', [AuthController::class, 'getUser']);
    Route::middleware('jwt.verify')->post('/update-profile', [AuthController::class, 'updateProfile']);
    Route::post('/send-otp', [AuthController::class, 'sendOtp']);
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
    Route::middleware('jwt.verify')->post('/change-password', [AuthController::class, 'changePassword']);

    Route::group([
        'middleware' => 'jwt.verify',
    ], function() {
        Route::prefix('events')->name('events.')->group(function (){
            Route::get('', [EventsController::class, 'index']);
            Route::post('/bylocation', [EventsController::class, 'eventsByLocation']);
            Route::post('/search', [EventsController::class, 'searchByEventsAndLocation']);
        });

        Route::prefix('users')->name('events.')->group(function (){
            Route::post('/follow', [UserController::class, 'follow'])->name('follow');
            Route::post('/unfollow', [UserController::class, 'unfollow'])->name('unfollow');
            Route::post('/search-in-followers', [UserController::class, 'searchInFollowers'])->name('search-in-follows');
            Route::post('/search-in-followings', [UserController::class, 'searchInFollowings'])->name('search-in-followings');
            Route::get('/follows', [UserController::class, 'listFollowers'])->name('follows');
            Route::get('', [UserController::class, 'index'])->name('get-all-users');
        });
    });
});
