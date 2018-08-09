<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class ReportedPostsController extends Controller
{
    public function index()
    {
        if(!auth()->user()->admin) return back();

        $reportedPosts = Post::where('reported',true)->latest()->paginate(10);

        return view('index.index', ['posts' => $reportedPosts, 'title' => "<span class='text-danger'>" . __('md.reported_posts') . "</span>"]);
    }
}
