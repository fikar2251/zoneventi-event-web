<?php

use App\Http\Controllers\Web\Admin\AdminsController;
use App\Http\Controllers\Web\Admin\AuthController;
use App\Http\Controllers\Web\Admin\Club\ClubsController;
use App\Http\Controllers\Web\Admin\Home\DashboardController;
use App\Http\Controllers\Web\Admin\Module\NotificationsController;
use App\Http\Controllers\Web\Admin\Module\SettingsController;
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
Route::get('/home', [DashboardController::class, 'dashboard'])->name('home');

// -------------------------------------------- Clubs  --------------------------------------------
Route::get('/clubs', [ClubsController::class, 'index'])->name('clubs-index');
Route::get('/club-create', [ClubsController::class, 'create'])->name('club-create');
Route::get('/clubs-detail', [ClubsController::class, 'show'])->name('club-detail');
Route::get('/clubs-detail/event-create', [ClubsController::class, 'createEvent'])->name('event-create');
Route::get('/clubs-pending', [ClubsController::class, 'pending'])->name('clubs-pending');
Route::get('/clubs-pending-request', [ClubsController::class, 'detail'])->name('clubs-pending-request');

// -------------------------------------------- Users  --------------------------------------------
Route::get('/users-list', [UsersController::class, 'index'])->name('users-list');

// -------------------------------------------- Admin  --------------------------------------------
Route::get('/admins-list', [AdminsController::class, 'index'])->name('admins-list');
Route::get('/admin-create', [AdminsController::class, 'create'])->name('admins-create');

// -------------------------------------------- Notification  --------------------------------------------
Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');

// -------------------------------------------- Settings  --------------------------------------------
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');