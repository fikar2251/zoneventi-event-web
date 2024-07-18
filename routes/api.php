<?php

use App\Http\Controllers\Admin\API\v1\AuthController;
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
    Route::post('/logout',[AuthController::class, 'logout']); 
    Route::middleware('jwt.verify')->get('/user', [AuthController::class, 'getUser']);
    Route::middleware('jwt.verify')->post('/update-profile', [AuthController::class, 'updateProfile']);
    Route::post('/send-otp', [AuthController::class, 'sendOtp']);
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
    Route::middleware('jwt.verify')->post('/change-password', [AuthController::class, 'changePassword']);

    Route::group([
        'middleware' => 'jwt.verify',
        'prefix' => 'master'
    ], function() {
        // Route::prefix('category')->name('category.')->group(function (){
        //     Route::get('', [CategoriesController::class, 'index']);
        // });
    });
});
