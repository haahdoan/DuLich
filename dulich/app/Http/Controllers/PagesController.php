<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class PagesController extends Controller
{
	//hien thi thong tin nguoi dung
    function getNguoidung() {
    	$user = Auth::user();
    	return view('page.nguoidung', ['nguoidung' => $user]);
    }

    function postNguoidung(Request $request) {
    	$this->validate($request,[
    		'name' => 'required',
    		'address' => 'required'
    	],[
    		'name.required' => 'Please fill in Full name!',
    		'address.required' => 'Please fill in Address!'
    	]);

    	$user = Auth::user();
    	$user->name = $request->name;
    	$user->address = $request->address;

    	if($request->checkPass == "on")
    	{
    			$this->validate($request,[
    			'password' => 'required|max:10',
    			'new_pass' => 'required|max:10',
    			're_new_pass' => 'required|same:new_pass'
    		],[
    			'password.required' => 'Please fill in Password!',
    			'password.max' => 'Password of up to 10 characters!',
    			'new_pass.required' => 'Please fill in New password!',
    			'new_pass.max' => 'New password of up to 10 characters!',
    			're_new_pass.required' => 'Please fill in New password again!',
    			're_new_pass.same' => 'New passwords are not the same!'
    		]);

    		if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    			$user->password = bcrypt($request->new_pass);
    		}
	    	else {
	    		return redirect()->back()->with('thongbao','The Current password is incorrect!');
	    	}
	    }

	    $user->save();
	    return redirect('nguoidung')->with('thongbao','Edit sucessfully!');
    }
}
