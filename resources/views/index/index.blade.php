@extends('layouts.master') 
@section('title') {{ $title ?? '' }}
@endsection
 
@section('before-content') @if(isset($popular_link))
<nav class="nav">
    <a class="nav-link" href="{{ $popular_link ?? '' }}">@lang('md.popular')</a>
</nav>
@endif
@endsection
 
@section('content') @auth
<div class="card p-3 shadow-sm mb-3">
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <textarea class="form-control from-control-sm" name="content"></textarea>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                @if(isset($tag))
                <input value="{{ $tag->name }}" class="form-control form-control-sm" type="text" name="tag" placeholder="Tag" required minlength="3">               
                @else
                <input class="form-control form-control-sm" type="text" name="tag" placeholder="Tag" required minlength="3">                
                @endif
            </div>

            <div class="col-sm-4">
                <input name="image" type="file" accept="image/x-png,image/gif,image/jpeg">
            </div>

            <div class="col-sm-2">
                <button class="btn btn-block btn-sm btn-primary" type="submit"><i class="fas fa-plus-circle"></i> @lang('md.add')</button>
            </div>

        </div>

    </form>
</div>
@endauth @foreach($posts as $post)
    @include('components.post', ['post '=> $post]) @endforeach {{ $posts->links() }}
@endsection