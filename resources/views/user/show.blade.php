@extends('layouts.master')

@section('head.title')
@lang('user.profile'): {{ $user->name ?? 'User' }}
@endsection

@section('title')
@lang('user.profile'): {{ $user->name ?? 'User' }}
@endsection

@section('content') 
    <div class="row mb-2">
        <div class="col-sm-3 text-center">
                <img height="64px" src="{{ Storage::url($user->avatar) }}"> 

                @if($user->admin)
                    <div class="text-danger mt-2"><i class="fas fa-star"></i>@lang('md.admin')</div>
                @endif

                @auth
                    @if(Auth::user()->id == $user->id)
                        <br>
                        <br>
                        <form method="POST" action="{{ route('users.update', [$user->id]) }}" enctype="multipart/form-data">
                            <input type="file" accept="image/*" name="avatar" required>
                            <button class="btn btn-primary mt-3"><i class="far fa-user-circle"></i> Update Avatar</button>
                        </form>
                    @endif

                    @if(Auth::user()->admin)
                         <a href="{{ route('users.restore_avatar', $user) }}" class="btn btn-outline-danger"><i class="far fa-user-circle"></i> @lang('md.restore_avatar')</a>
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
                @if($recent_posts->count() > 0)
            @foreach($recent_posts as $post) 
                @include('components.post', ['post' => $post])
            @endforeach
            @else 
            @lang('md.no_posts')
        @endif
        </div>
    </div>
@endsection