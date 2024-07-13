<?php

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

Route::get('/login', function () {
    return view('layouts.login');
});

Route::get('/registration', function () {
    return view('layouts.registration');
});

Route::get('/registration-confirmation', function () {
    return view('layouts.registration-confirmation');
});

Route::get('/home', function () {
    return view('admin.dashboard.dashboard');
});

Route::get('/clubs', function () {
    return view('admin.clubs.index');
});

Route::get('/club-detail', function () {
    return view('admin.clubs.show');
});

Route::get('/pending-club', function () {
    return view('admin.clubs.pending');
});