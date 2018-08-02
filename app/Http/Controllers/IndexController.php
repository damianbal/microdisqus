<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class IndexController extends Controller
{
    public function recent()
    {
        $posts = Post::where('comment', false)->latest()->paginate(10);

        return view('index.index', ['posts' => $posts]);
    }

    public function popular()
    {

    }
}
