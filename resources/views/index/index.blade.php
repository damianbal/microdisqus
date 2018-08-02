@extends('layouts.master') 


@section('title')
{{ $title ?? 'Posts' }}
@endsection

@section('content')



@auth
<div class="mb-3">
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="form-group">
            <textarea class="form-control from-control-sm" name="content"></textarea>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <input class="form-control form-control-sm" type="text" name="tag" placeholder="Tag">
            </div>

            <div class="col-sm-2">
                <button class="btn btn-block btn-primary" type="submit"><i class="fas fa-plus-circle"></i> Add</button>

            </div>

        </div>

    </form>
</div>
@endauth

@foreach($posts as $post)


<div class="post mb-3">
    <div class="post-meta row text-muted font-weight-light">
        <div class="col-sm-6">
            Author: {{ $post->user->name }} <span class="badge badge-primary">{{ $post->tag->name }}</span>
        </div>

        <div class="col-sm-6 text-md-right">
            {{ $post->created_at->diffForHumans() }}
        </div>
    </div>



    <div class="post-content font-weight-light w-75">
        {{ $post->content }}
        <br>

        <a href="{{ route('posts.show', $post->id) }}">Show post</a>
    </div>

    <div class="row post-meta">
        <div class="col-sm-12">
            <i class="fas fa-thumbs-up"></i> {{ $post->likes->count() }}
        </div>
    </div>
</div>
@endforeach {{ $posts->links() }}
@endsection