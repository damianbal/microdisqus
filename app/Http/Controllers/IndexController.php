<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class IndexController extends Controller
{
    public function recent()
    {
        $posts = Post::posts()->latest()->paginate(10);

        return view('index.index', ['posts' => $posts, 'title' => 'Recent posts']);
    }

    public function popular()
    {
        $posts = Post::posts()->withCount('likes')->orderBy('likes_count', 'DESC')->paginate(10);

        return view('index.index', ['posts' => $posts, 'title' => 'Posts with most likes']);
    }
}
