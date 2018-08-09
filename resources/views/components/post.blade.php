<div class="post mb-3 hide-section">
    <div class="post-meta row text-muted font-weight-light small">
        <div class="col-sm-6">
            @lang('md.author'): <a href="{{ route('users.show', [$post->user->id]) }}">{{ $post->user->name }}</a>
        </div>

        <div class="col-sm-6 text-md-right ">
            <a href="{{ route('tags', [$post->tag->id]) }}">{{ $post->tag->name }}</a> {{ $post->created_at->diffForHumans() }}
            <br>

        </div>
    </div>

    <div class="row">
        <div class="col-10">
            <div class="post-content font-weight-light w-75">
                {{ $post->content }}
                <br>

                <a class="hidden" href="{{ route('posts.show', $post->id) }}">@lang('md.show_post')</a>
            </div>

            <div class="row post-meta">
                <div class="col-sm-12">
                    <i class="fas fa-thumbs-up"></i> {{ $post->likes->count() }} &nbsp;
                    <i class="fas fa-comment"></i> {{ $post->replies->count() }}
                </div>
            </div>
        </div>

        <div class="col-2 text-sm-right">
            <img height="48px" class="rounded" src="{{ asset('storage/' . $post->user->avatar) }}">
        </div>
    </div>
</div>