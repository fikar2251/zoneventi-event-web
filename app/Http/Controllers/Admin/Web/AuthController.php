<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() 
    {
        return view('layouts.login');
    }

    public function register()
    {
        return view('layouts.registration');
    }

    public function registerConfirmation()
    {
        return view('layouts.registration-confirmation');
    }
}
