<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show(Request $request, User $user)
    {
        return view('user.show', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        // 
    }
}
