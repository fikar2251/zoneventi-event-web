<?php

namespace App\Http\Controllers\Web\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard.dashboard');
    }
}
