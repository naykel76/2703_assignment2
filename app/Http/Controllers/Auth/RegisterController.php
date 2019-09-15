<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use App\Mail\RegistrationSuccessful;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

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
        ]);

        Address::create([
            'user_id' => $user->id, // from newly created user
            'street_num' => '15',
            'street' => '15, Tanby St',
            'suburb' => 'Sunnybank Hills',
            'state' => 'Queensland',
            'postcode' => '4109',
        ]);

        // create relationship record in role_user table
        $user->roles()->attach($role);

        // send welcome email
        // \Mail::to($user->email)->send(
        //     new RegistrationSuccessful($user)
        // );

        return $user;
    }

    // ------------------------------------------------
    /**
     * Show the application registration form.
     */
    public function showRegistrationForm()
    {
        $data = [
            'title' => 'User Registration',
            // 'roles' => Role::all()


        ];
        return view('auth.register')->with($data);
    }
}
