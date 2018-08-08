<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;
    
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;    
    }

    public function show(Request $request, User $user)
    {
        
        return view('user.show', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        if(!$request->user()->can('update', $user)) {
            return back();
        }

        $this->userService->setup($user);

        // update avatar if it was set
        $this->userService->handleUpdateAvatar($request);

        return back()->with('message', 'Profile updated!');
    }
}
