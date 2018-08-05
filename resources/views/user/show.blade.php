@extends('layouts.master')

@section('title')
@lang('user.profile'): {{ $user->name ?? 'User' }}
@endsection

@section('content') 
    <div class="row mb-2">
        <div class="col-sm-3 text-center">
            <img width="50%" src="{{ $user->avatar }}">
        </div>

        <div class="col-sm-9">
            <h2>{{ $user->name ?? 'User' }} </h2>
            <div>@lang('md.joined'): {{ $user->created_at->diffForHumans() }}</div>
        <div>@lang('md.posts'): {{ $user->posts->count() }}</div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-secondary text-white">@lang('md.recent_posts')</div>
        <div class="card-body ">
            @foreach($user->posts()->latest()->take(4)->get() as $post) 
                @include('components.post', ['post' => $post])
            @endforeach
        </div>
    </div>
@endsection