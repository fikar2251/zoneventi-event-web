<?php

use App\Http\Controllers\Web\Admin\AdminsController;
use App\Http\Controllers\Web\Admin\AuthController;
use App\Http\Controllers\Web\Admin\Club\ClubsController;
use App\Http\Controllers\Web\Admin\Home\DashboardController;
use App\Http\Controllers\Web\Admin\Module\NotificationsController;
use App\Http\Controllers\Web\Admin\User\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// -------------------------------------------- Login & Register  --------------------------------------------
Route::get('/login', [AuthController::class, 'login']);
Route::get('/registration', [AuthController::class, 'register']);
Route::get('/registration-confirmation', [AuthController::class, 'registerConfirmation']);

// -------------------------------------------- Dashboard  --------------------------------------------
Route::get('/home', [DashboardController::class, 'dashboard']);

// -------------------------------------------- Clubs  --------------------------------------------
Route::get('/clubs', [ClubsController::class, 'index'])->name('clubs-index');
Route::get('/clubs-detail', [ClubsController::class, 'show']);
Route::get('/clubs-pending', [ClubsController::class, 'pending'])->name('clubs-pending');