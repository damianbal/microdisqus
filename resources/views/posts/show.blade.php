@inject('postService', 'App\Services\PostService') 
@extends('layouts.master') 
@section('title') @lang('md.post')
@endsection

@section('head.title')
    {{ substr($post->content, 0, 15) }}
@endsection


@section('content')
<div class="post mb-3 p-3 hide-section">
    @auth
        @if(Auth::user()->admin)
            <div class="row  bg-light p-2 border mb-3">
                <div class="col-sm-12">
                    <h3>Admin Tools</h3>
                    <form method="POST" action="{{ route('posts.destroy', [$post]) }}">
                        @method('DELETE')
                        @csrf
                    <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i> @lang('md.remove')</button>
                    </form>

                    @if($post->image)
                    <form method="POST" action="{{ route('posts.remove_image', [$post]) }}">
                        @csrf 
                        <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i> @lang('md.remove_image')</button>
                    </form>
                    @endif

                    @if($post->reported)
                        <a href="{{ route('posts.unreport', $post) }}" class="btn btn-outline-info btn-sm"><i class="fas fa-flag"></i> @lang('md.unreport')</a>
                    @endif
                </div>
            </div>
        @endif
    @endauth

    @auth
        @if($post->reported == false)
        <div class="row mb-3 hidden">
            <div class="col-sm-12">
            <a  class="btn btn-sm btn-outline-danger" href="{{ route('posts.report', [$post]) }}"><i class="fas fa-flag"></i> @lang('md.report')</a>
            </div>
        </div>
        @endif
    @endauth

    <div class="post-meta small row text-muted font-weight-light">
        <div class="col-sm-6">
            @lang('md.author'): <a href="{{ route('users.show', [$post->user->id]) }}">{{ $post->user->name }}</a>
        </div>

        <div class="col-sm-6 text-md-right">
            {{ $post->created_at->diffForHumans() }} / Tag: {{ $post->tag->name }} / @lang('md.views'): {{ $post->views }}
        </div>
    </div>

    <div class="post-content font-weight-light w-75">
        {{ $post->content }}
        <br>
        <br> @if(isset($post->image))
        {{-- <img width="300px" src="{{ asset('storage/' . $post->image) }}"> @endif --}}
                <a href="{{ Storage::url($post->image) }}"> <img  width="300px" class="img-fluid" src="{{ Storage::url($post->image) }}"> </a> @endif  
        <br>
        <br>

    </div>

    <div class="row post-meta">
        <div class="col-sm-12">
            <i class="fas fa-thumbs-up"></i> {{ $post->likes->count() }}
        </div>
    </div>

    <div class="mt-3">
        @auth @if(!$liked)
        <a href="{{ route('posts.like', $post->id) }}" class="btn  btn-sm btn-primary btn-like"><i class="fas fa-thumbs-up"></i> Like</a>        @else
        <a href="{{ route('posts.unlike', $post->id) }}" class="btn  btn-sm btn-secondary btn-like"><i class="fas fa-thumbs-down"></i> Unlike</a>        @endif @endauth
    </div>
</div>

@if($post->replies()->count() > 0)
<div class="card mb-3 shadow-sm">
    @foreach($post->replies()->latest()->get() as $p)
        @include('components.reply', ['post' => $p]) 
    @endforeach
</div>
@endif 

@auth
<div class="card mb-3">
    <div class="card-header">@lang('md.add_reply')</div>

    <div class="card-body">

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <textarea class="form-control from-control-sm" name="content"></textarea>
            </div>
            <input name="post_id" value="{{ $pid }}" hidden>
            <div class="form-group row">

                <div class="col-sm-4">
                    <input name="image" type="file" accept="image/x-png,image/gif,image/jpeg">
                </div>

                <div class="col-sm-4">
                    <button class="btn btn-sm btn-secondary" type="submit"><i class="fas fa-plus-circle"></i> @lang('md.send')</button>

                </div>


            </div>

        </form>
    </div>
</div>
@endauth

@endsection