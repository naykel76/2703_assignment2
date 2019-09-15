<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $user = Auth::user(); // current user
        // $role = $user->roles()->first(); // user role object
        // $userRole = $role->name;
        // dd($userRole);

        $data = [
            'title' => 'User Dashboard',
            'user' => Auth::user()
        ];

        return view('users.dashboard')->with($data);
    }
}
