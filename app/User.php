<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Posts made by user
     * 
     */
    public function posts()
    {
        return $this->hasMany('App\Post', 'user_id');
    }

    /**
     * Likes
     *
     *
     */
    public function likes()
    {
        return $this->hasMany('App\Like', 'user_id');
    }

    /**
     * Restore avatar to the default one
     *
     * @return void
     */
    public function restoreAvatar()
    {
        $this->avatar = "avatars/avatar.png";
        $this->save();
    }
}
