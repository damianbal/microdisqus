<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\Like;
use App\Post;

class LikeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user' => User::find($this->user_id)->name,
            'post' => substr(Post::find($this->post_id)->content,0,15)."...",
            'created_ago' => $this->created_at->diffForHumans(),
            'user_link' => route('users.show', [$this->user_id]),
            'post_link' => route('posts.show', [$this->post_id])
        ];
    }
}
