@extends('layouts.master')

@section('title')
@lang('user.profile'): {{ $user->name ?? 'User' }}
@endsection

@section('content') 
    <div class="row mb-2">
        <div class="col-sm-3 text-center">
                <img class="img-fluid" src="{{ asset('storage/' . $user->avatar) }}"> 

                @auth
                    @if(Auth::user()->id == $user->id)
                        <br>
                        <br>
                        <form method="POST" action="{{ route('users.update', [$user->id]) }}" enctype="multipart/form-data">
                            <input type="file" accept="image/*" name="avatar" required>
                            <button class="btn btn-primary mt-3">Update Avatar</button>
                        </form>
                    @endif
                @endauth
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
                @if($user->posts->count() > 0)
            @foreach($user->posts()->latest()->take(4)->get() as $post) 
                @include('components.post', ['post' => $post])
            @endforeach
            @else 
            @lang('md.no_posts')
        @endif
        </div>
    </div>
@endsection