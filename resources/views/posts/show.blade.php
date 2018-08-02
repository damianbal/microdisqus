@extends('layouts.master')

@section('content')
<div class="post mb-3">
        <div class="post-meta row text-muted font-weight-light">
            <div class="col-sm-6">
                Author: {{ $post->user->name }}
            </div>
    
            <div class="col-sm-6 text-md-right">
                {{ $post->created_at->diffForHumans() }}
            </div>
        </div>
    
        <div class="post-content font-weight-light w-75">
            {{ $post->content }}
        <br> 

        </div>
    
        <div class="row post-meta">
                <div class="col-sm-12">
                    <i class="fas fa-thumbs-up"></i> {{ $post->likes->count() }}
                </div>
        </div>

        <div class="mt-3">
            @auth
                @if(!$liked)
                     <a href="{{ route('posts.like', $post->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-thumbs-up"></i> Like</a>
                @else
                     <a href="{{ route('posts.unlike', $post->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-thumbs-down"></i> Unlike</a>
                @endif
            @endauth
        </div>
    </div>

    <div class="replies">

    </div>

    <div class="border p-1 rounded">
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
            <div class="form-group">
                <textarea class="form-control from-control-sm" name="content"></textarea>
            </div>
        <input name="post_id" value="{{ $post->id }}" type="hidden">
            <div class="form-group row">
    
                <div class="col-sm-12">
                    <button class="btn btn-sm btn-secondary" type="submit"><i class="fas fa-plus-circle"></i> Send</button>
    
                </div>
    
            </div>
    
        </form>
    </div>
@endsection