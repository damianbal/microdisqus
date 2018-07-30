<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function show()
    {
        //
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => 'min:3|required',
            'email' => 'min:3|email|unique:users|required',
            'password' => 'min:3|required',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
    }
}
