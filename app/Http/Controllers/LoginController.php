<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Validator;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $this->validate($request, 
        [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user_data = array(
            'email' => $request->email,
            'password' => $request->password
        );

        if(Auth::attempt($user_data))
        {

            return view('dashboard');

        }else{

            return back()->with('error', 'Incorrect Email or Password!');

        }

    }
}
