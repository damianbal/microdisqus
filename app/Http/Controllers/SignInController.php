<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function show()
    {
        return view('sign-in.show');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|min:3',
            'password' => 'required|min:3'
        ]);

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            
        }
        else {
            
        }
    }

    public function signOut() 
    {
        Auth::logout();

        return back()->with('message', 'You have been signed out!');
    }
}
