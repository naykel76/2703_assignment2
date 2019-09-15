<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * redirectTo() function replaces protected $redirectTo = '/dashboard';
     */

    protected $redirectTo = '/dashboard';

    // public function redirectTo()
    // {

    //     $user = \Auth::user(); // current user
    //     // $role = $user->roles()->first(); // user role object
    //     // $userRole = $role->name;
    //     // dd($userRole);

    //     // return '/dashboard';

    //     if ($user->hasRole('admin')) {
    //         return redirect()->intended();
    //         // return back();
    //         // dd('user is admin');
    //     } else if ($user->hasRole('user')) {
    //         return back();
    //         // dd('user is user');
    //     } else if ($user->hasRole('other')) {
    //         return back();
    //         // dd('user is other');
    //     }
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
