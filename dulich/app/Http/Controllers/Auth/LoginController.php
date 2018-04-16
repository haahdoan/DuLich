<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use \Validator;
use Auth;
use Illuminate\Support\MessagesBag;

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
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //dang nhap
    public function getLogin(){
        return view('page.dangnhap');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|max:10',
        ], [
            'email.required' => 'Please fill in Email!',
            'password.required' => 'Please fill in Password!',
            'email.email' => 'Incorrect email format!',
            'password.max' => 'Password of up to 10 characters!',
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //dd('Logged in successfully!');
            //return redirect('dang-nhap')->with('thanhcong','Logged in successfully!');
            return redirect('home');
        }else {
            return redirect()->back()->with('thanhcong','The email or password is incorrect!');
        }
    }
}
