@inject('tagService', 'App\Services\TagService')

<div class="card bg-light">
    <div class="card-header"> @lang('md.popular_tags') </div>

    <div class="card-body">
        @foreach($tagService->getPopularTags() as $tag)
         <a class="btn btn-secondary btn-sm mb-1" href="{{ route('tags', [$tag->id]) }}">{{ $tag->name }} ({{ $tag->posts->count() }})</a>        
        @endforeach
    </div>
</div>