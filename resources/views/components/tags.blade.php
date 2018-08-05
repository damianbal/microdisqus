@inject('tagService', 'App\Services\TagService')

<div class="card bg-light mb-3">
    <div class="card-header"> @lang('md.popular_tags') </div>

    <div class="card-body">
        @foreach($tagService->getPopularTags() as $tag)
            <a class="btn btn-light btn-sm mb-1" href="{{ route('tags', [$tag->id]) }}">{{ $tag->name }} ({{ $tag->posts->count() }})</a>        
        @endforeach
    </div>
</div>