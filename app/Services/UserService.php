<?php

namespace App\Services;

use App\User;

use Illuminate\Http\Request;

class UserService
{
    protected $user = null;

    public function setup(User $user) 
    {
        $this->user = $user;
    }

    public function resetAvatar() 
    {
        $this->user->avatar = 'avatars/avatar.png';
        $this->user->save();
    }

    public function handleUpdateAvatar(Request $request) 
    {
        if($request->has('avatar')) {
            $this->user->avatar = $request->avatar->store('avatars');
            $this->user->save();
        }
    }
}
