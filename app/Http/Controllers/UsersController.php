<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display user dashboard
    public function index()
    {

        $data = [
            'title' => 'User Dashboard',
            'user' => \Auth::user()
        ];

        return view('users.dashboard')->with($data);
    }

    public function edit($user)
    {
        $data = [
            'title' => 'Edit Profile',
            'user' => Auth::user()
        ];

        return view('users.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data = [
        //    'myModel' => MyModel::
        // ];

        return redirect('dashboard');
    }
}
