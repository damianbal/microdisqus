<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'tag_id', 'user_id', 'post_id'
    ];    


    public function scopeComments($q)
    {
        $q->where('comment', true);
    }

    public function scopePosts($q)
    {
        $q->where('comment', false);
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function replies()
    {
        return $this->hasMany('App\Post', 'post_id');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'post_id');
    }

    public function tag()
    {
        return $this->belongsTo('App\Tag', 'tag_id');
    }
}
