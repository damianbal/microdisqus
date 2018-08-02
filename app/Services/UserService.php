<?php

namespace App\Services;

use App\User;

class UserService
{
    protected $user = null;

    public function setup(User $user) 
    {
        $this->user = $user;
    }
}
