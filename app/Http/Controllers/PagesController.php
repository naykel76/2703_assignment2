<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Role;

class PagesController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'Home Page'
        ];

        return view('index')->with($data);
    }

    public function test()
    {

        // simulate a logged in user
        // $user = Auth::loginUsingId(1);



        // check if the user has the role of 'admin'
        /* if ($user->hasRole('admin')) {
            // user is admin
        } else if ($user->hasRole('user')) {
            // user is user
        } else if ($user->hasRole('other')) {
            // user is other
        } */


        $data = [
            'title' => 'Testing Page'
        ];

        return view('test')->with($data);
    }
}
