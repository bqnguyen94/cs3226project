<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\ActivationService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/';

    protected $activationService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService)
    {
        $this->middleware('guest');
        $this->activationService = $activationService;
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
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users',
                'regex:(([a-zA-Z._]+)(@u.nus.edu|@comp.nus.edu.sg|@nus.edu.sg))',
            ],
            'password' => 'required|min:6|confirmed',
        ], [
            'email.regex' => 'Please use a valid NUS email address in the user-friendly format e.g. arron.tan@u.nus.edu instead of e0123456@u.nus.edu'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => User::ROLE_USER,
        ]);

        $this->activationService->sendActivationMail($user);
        return $user;
    }
}
