<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function showDashboard()
    {
        return view('admin.dashboard');
    }
}
