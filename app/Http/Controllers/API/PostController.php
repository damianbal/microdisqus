<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    /**
     * Return recent posts
     *
     * @return void
     */
    public function recent(Request $request)
    {
        $count = $request->input('count', 3);

        $posts = Post::orderBy('created_at', 'DESC')->limit($count)->get();

        return $posts;
    }
}
