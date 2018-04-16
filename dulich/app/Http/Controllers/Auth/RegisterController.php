<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Session;

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
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function getSignin(){
        return view('page.dangki');
    }

    public function postSignin(Request $req){
        $this->validate($req,
            [
                'name' => 'required',
                'address' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|max:10',
                're_pass' => 'required|same:password'
            ],
            [
                'name.required' => 'Please fill in Full name!',
                'address.required' => 'Please fill in Address!',
                'email.required' => 'Please fill in Email!',
                'password.required' => 'Please fill in Password!',
                're_pass.required' => 'Please fill in Re-password!',
                'email.email' => 'Incorrect email format!',
                'email.unique' => 'Email has been used!',
                'password.max' => 'Password of up to 10 characters!',
                're_pass.same' => 'Passwords are not the same!'
            ]);
        $user = new User();
        $user->name = $req->name;
        $user->address = $req->address;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect(home)
            ->with('thanhcong', 'Account sucessfully created!');
    }
}
