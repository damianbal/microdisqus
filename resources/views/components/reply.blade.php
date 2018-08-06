<div class="row p-3">
    <div class="col-sm-2 text-center">
            <img height="48px" class="rounded" src="{{ asset('storage/' . $post->user->avatar) }}">
        </div>
    <div class="col-sm-7">
        <div class="small text-muted">
            <a href="{{ route('users.show', [$post->user->id]) }}">{{ $post->user->name }}</a>
        </div>
        <div>{{ $post->content ?? '[Content]' }}</div>
        @if(isset($post->image))
        <div>
            <img src="{{ asset('storage/' . $post->image) }}">
        </div>
        @endif
    </div>

    <div class="col-sm-3  text-center">
        <div class="small text-muted">
            {{ $post->created_at->diffForHumans() }}
        </div>

        <div>
            @auth @php $postService->setup($post) @endphp @if(!$postService->liked(Auth::user()))
            <a href="{{ route('posts.like', $post->id) }}" class="btn btn-sm btn-primary">
                <i class="fas fa-thumbs-up"></i> {{ $post->likes->count() }}</a>
            @else
            <a href="{{ route('posts.unlike', $post->id) }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-thumbs-down"></i> {{ $post->likes->count() }}</a>
            @endif @endauth

            @guest
            <div class="text-muted">
                <i class="fas fa-thumbs-up"></i> {{ $post->likes->count() }}</a>
            </div>
            @endguest
        </div>
    </div>
</div>