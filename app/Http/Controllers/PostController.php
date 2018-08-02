<?php

namespace App\Http\Controllers;

use App\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $sort = $request->input('sort', 'recent'); // popular

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'min:3|required',
        ]);

        $tag = $request->input('tag');
        
        // does form have input post_id? if yes, then we creating sub post for post with post_id
        if($request->has('post_id')) {
            $post = Post::find($request->post_id);
            $this->postService->setup($post);
            $tag = $post->tag->name;
        }

        $post = $this->postService->addPost(Auth::user(), $tag, $data['content']);

        return redirect()->route('posts.show', [$request->post_id])->with('message', 'Post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $liked = false;

        // is it liked by signed in user?
        if (Auth::check()) {
            $this->postService->setup($post);

            $liked = $this->postService->liked(Auth::user());
        }

        return view('posts.show', ['post' => $post, 'liked' => $liked]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function like(Post $post)
    {
        $this->postService->setup($post);
        $this->postService->like(Auth::user());
        return back();
    }

    public function unlike(Post $post)
    {
        $this->postService->setup($post);
        $this->postService->unlike(Auth::user());
        return back();
    }
}