<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLogin() {
        return view('admin.auth.login');
    }

    public function showDashboard() {
        return view('admin.dashboard');
    }
}
