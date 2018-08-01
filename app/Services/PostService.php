<?php

namespace App\Services;

use App\Like;
use App\Post;
use App\User;
use App\Tag;

class PostService
{
    protected $post = null;
    protected $user = null;

    public function setup($post, $user = null)
    {
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Create post, if post is set post is going to be created as sub post for $this->post
     *
     * @param [type] $tag
     * @param [type] $content
     * @return void
     */
    public function addPost($tag, $content)
    {


        $t = Tag::where('name', $tag)->first();

        if($t == null) {
            $t = Tag::create(['name' => $tag]);
        }

        // if $this->post is set then create sub post for that post
        if($this->post != null) {
            $post = Post::create([
                'content' => $content,
                'user_id' => $this->user->id,
                'tag_id' => $t->id,
                'comment' => true,
                'post_id' => $this->post->id
            ]);
        }
        else {
            $post = Post::create([
                'content' => $content,
                'user_id' => $this->user->id,
                'tag_id' => $t->id,
                'comment' => false,
            ]);
        }

        return $post;
    }

    /**
     * Is post liked by user?
     *
     * @return void
     */
    public function liked()
    {
        // find like
        $like = Like::where([
            ['post_id', '=', $this->post->id],
            ['user_id', '=', $this->user->id],
        ])->first();

        if ($like == null) {
            return false;
        }

        return true;
    }

    /**
     * Like the post
     *
     * @return boolean
     */
    public function like()
    {
        if (!$this->liked()) {
            Like::create(['post_id' => $this->post->id, 'user_id' => $this->user->id]);
            return true;
        }

        return false;
    }

    /**
     * Unlike the post
     *
     * @return boolean
     */
    public function unlike()
    {
        if ($this->liked()) {
            $like = Like::where([
                ['post_id', '=', $this->post->id],
                ['user_id', '=', $this->user->id],
            ])->delete();

            return true;
        }

        return false;
    }
}
