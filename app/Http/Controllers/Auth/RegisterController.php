<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Supplier;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
		    |--------------------------------------------------------------------------
		    | Register Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users as well as their
		    | validation and creation. By default this controller uses a trait to
		    | provide this functionality without requiring any additional code.
		    |
	*/

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     */
    // protected $redirectTo = '/dashboard';

    protected function redirectTo()
    {
        // redirect users to suppliers (restaurants) page
        if (auth()->user()->hasRole('user')) {
            return '/restaurants';
        } else {
            // else go the the dashboard
            return '/dashboard';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'role_id' => ['required'],
            'street_num' => ['required'],
            'street' => ['required'],
            'suburb' => ['required'],
            'state' => ['required'],
            'postcode' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $role = $data['role_id'];

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'street_num' => $data['street_num'],
            'street' => $data['street'],
            'suburb' => $data['suburb'],
            'state' => $data['state'],
            'postcode' => $data['postcode'],
        ]);

        // create related record if supplier
        if ($role == 3) {
            Supplier::create([
                'id' => $user->id,
                'user_id' => $user->id,
                'is_approved' => false,
            ]);
        }

        // create relationship record in role_user table
        $user->roles()->attach($role);

        // send welcome email
        // \Mail::to($user->email)->send(
        //     new RegistrationSuccessful($user)
        // );

        return $user;
    }

    /**
     * Show the application registration form.
     */
    public function showRegistrationForm()
    {
        $data = [
            'title' => 'User Registration',
        ];
        return view('auth.register')->with($data);
    }
}
