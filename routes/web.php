<?php

use App\Http\Controllers\Web\Admin\AdminsController;
use App\Http\Controllers\Web\Admin\AuthController;
use App\Http\Controllers\Web\Admin\Club\ClubsController;
use App\Http\Controllers\Web\Admin\Home\DashboardController;
use App\Http\Controllers\Web\Admin\Module\NotificationsController;
use App\Http\Controllers\Web\Admin\Module\SettingsController;
use App\Http\Controllers\Web\Admin\User\UsersController;
use App\Http\Controllers\Web\Owner\Club\ClubsController as ClubClubsController;
use App\Http\Controllers\Web\Owner\Club\ClubSettingsController;
use App\Http\Controllers\Web\Owner\Club\PaymentsController;
use App\Http\Controllers\Web\Owner\Module\SettingsController as ModuleSettingsController;
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

// -------------------------------------------- Login & Register  --------------------------------------------
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/registration', [AuthController::class, 'register'])->name('registration');
    Route::post('/registration', [AuthController::class, 'postRegisterStep1'])->name('registration.step1');
    Route::get('/registration-confirmation', [AuthController::class, 'registerConfirmation'])->name('registration.confirmation');
    Route::post('/registration-confirmation', [AuthController::class, 'postRegisterStep2'])->name('registration.step2');
    Route::get('/get-city-list', [AuthController::class, 'getCityList'])->name('getCityList');
    Route::post('/register/step2', [AuthController::class, 'postRegisterStep2'])->name('register.step2');

    Route::post('/register', [AuthController::class, 'postRegister'])->name('submit-register');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('submit-login');
});

Route::middleware('auth')->group(function () {
    // -------------------------------------------- Dashboard  --------------------------------------------
    Route::get('/home', [DashboardController::class, 'dashboard'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // -------------------------------------------- Clubs  --------------------------------------------
    Route::get('/clubs', [ClubsController::class, 'index'])->name('clubs-index');
    Route::get('/club-create', [ClubsController::class, 'create'])->name('club-create');
    Route::post('/club-create', [ClubsController::class, 'store'])->name('club-store');
    Route::get('/clubs-detail/{id}', [ClubsController::class, 'show'])->name('club-detail');
    Route::get('/clubs-detail/event-create', [ClubsController::class, 'createEvent'])->name('event-create');
    Route::get('/clubs-pending', [ClubsController::class, 'pending'])->name('club-pending');
    Route::get('/clubs-pending-request', [ClubsController::class, 'detail'])->name('club-pending-request');

    // -------------------------------------------- Users  --------------------------------------------
    Route::get('/users-list', [UsersController::class, 'index'])->name('users-list');

    // -------------------------------------------- Admin  --------------------------------------------
    Route::get('/admins-list', [AdminsController::class, 'index'])->name('admins-list');
    Route::get('/admin-create', [AdminsController::class, 'create'])->name('admins-create');
    Route::post('/admin-create', [AdminsController::class, 'store'])->name('admins-store');
    Route::delete('/admin-delete/{id}', [AdminsController::class, 'destroy'])->name('admins-delete');

    // -------------------------------------------- Notification  --------------------------------------------
    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');

    // -------------------------------------------- Settings  --------------------------------------------
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

    // -------------------------------------------- Clubs Owner  --------------------------------------------
    Route::get('/owner/club-events', [ClubClubsController::class, 'index'])->name('club-event-owner');

    // -------------------------------------------- Settings Owner  --------------------------------------------
    Route::get('/owner/club-create-event', [ClubSettingsController::class, 'index'])->name('club-setting-owner');

    // -------------------------------------------- Admins Owner  --------------------------------------------
    Route::get('/owner/admins-list', [AdminsController::class, 'index'])->name('admin-list-owner');

    // -------------------------------------------- Admins Owner  --------------------------------------------
    Route::get('/owner/payment', [PaymentsController::class, 'index'])->name('payment-owner');
});