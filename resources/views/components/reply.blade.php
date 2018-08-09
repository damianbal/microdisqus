<div class="row hide-section p-3">
    <div class="col-sm-12">
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


    </div>
</div>

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
            <a href="{{ Storage::url($post->image) }}"><img class="img-fluid" width="50%" src="{{ Storage::url($post->image) }}"></a>
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

            @auth
                @if($post->reported == false)
                    <div class="row mt-3 mb-3 hidden">
                        <div class="col-sm-12">
                        <a  class="btn btn-sm btn-outline-danger" href="{{ route('posts.report', [$post]) }}"><i class="fas fa-flag"></i> @lang('md.report')</a>
                        </div>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>