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
        $recentPosts = $user->posts()->where('comment', false)->latest()->take(4)->get();

        return view('user.show', ['user' => $user, 'recent_posts' => $recentPosts]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'avatar' => 'required|image'
        ]);

        if(!$request->user()->can('update', $user)) {
            return back();
        }

        $this->userService->setup($user);

        // update avatar if it was set
        $this->userService->handleUpdateAvatar($request);

        return back()->with('message', 'Profile updated!');
    }

    public function restoreAvatar(Request $request, User $user)
    {
        if(!$user->admin) {
            return back();
        }

        $user->restoreAvatar();
        return back()->with('message', 'Avatar restored!');
    }
}
