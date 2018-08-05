<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->latest()->paginate(10);

        return view('index.index', ['posts' => $posts, 'tag' => $tag, 'title' => $tag->name, 'popular_link' => route('tags.popular', [$tag->id])]);
    }

    public function popular(Tag $tag)
    {
        $posts = $tag->posts()->withCount('likes')->orderBy('likes_count', 'DESC')->paginate(10);

        return view('index.index', ['posts' => $posts, 'tag' => $tag, 'title' => $tag->name]);
    }
}
