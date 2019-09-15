<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard',
            'user' => Auth::user(), // current admin user
            'users' => User::all() // all users
        ];

        return view('admin.dashboard')->with($data);
    }
}
