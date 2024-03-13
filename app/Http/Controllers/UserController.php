<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use App\Models\User;

class UserController extends Controller
{
    public function CreateUser()
    {
    	return view('admin.user.create');
    }
    public function SaveUser(Request $request)
    {
    	if ($request->isMethod('post')) 
        {                
      	    $user = new User;
      	    $current_time = date("Y-m-d h:i:s");
      	    $user->name= $request->input('UserName');
	        $user->email= $request->input('UserEmail');
	        $user->password=Hash::make($request->input('UserPassword'));
	        $user->created_at=$current_time;
	        $user->updated_at=$current_time;         
	        $user->save();
	        return redirect()->route('CreateUser')->with('message', 'Add user successfully !')->with('status','success');    
    	}    	
    }
    public function login()
    {
    	return view('admin.login');
    }
    public function authlogin(Request $request)
    {
    	$credentials = $request->only('email', 'password');
    	if (Auth::attempt($credentials)) 

    	//if (Auth::attempt(['name' => $request->input('name'), 'password' => $request->input('password')])) 
    	{
            $request->session()->regenerate();

            return redirect()->route('StudentList');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
	{
    	Auth::logout();

    	$request->session()->invalidate();

    	$request->session()->regenerateToken();

   		 return redirect()->route('Login');
	}
}
