<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {
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

	// protected $redirectTo = '/dashboard';

	public function redirectTo() {

		$user = \Auth::user(); // current user

		if ($user->hasRole('admin')) {
			return '/dashboard';
		} else if ($user->hasRole('user')) {
			return '/restaurants';
		} else if ($user->hasRole('supplier')) {
			return '/dashboard';
		}
	}

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest')->except('logout');
	}
}
