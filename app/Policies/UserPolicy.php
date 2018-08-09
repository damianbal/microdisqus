<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, User $user2) {
        return $user->id == $user2->id;
    }

    public function manage(User $user, User $user2) {
        return $user->admin == true;
    }
}
