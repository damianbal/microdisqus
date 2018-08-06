<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function show()
    {
        return view('sign-up.show');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => 'min:3|required|unique:users',
            'email' => 'min:3|email|unique:users|required',
            'password' => 'min:3|required',
        ]);

        $data['password'] = Hash::make($data['password']);

        // set avatar
        // $data['avatar'] = 'https://api.adorable.io/avatars/64/' . $data['name'] . 'png';

        $user = User::create($data);

        return redirect()->route('sign-in.show')->with('message', 'Your account has been created!');
    }
}
