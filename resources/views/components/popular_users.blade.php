
<div class="card bg-light mb-3">
    <div class="card-header"> @lang('md.popular_users') </div>

    <div class="card-body">
    @foreach(\App\User::latest()->take(3)->get() as $u)
        <a class="btn btn-block btn-light" href="{{ route('users.show', [$u->id]) }}" data-toggle="tooltip" title="{{ $u->posts->count() }} @lang('md.posts')">{{ $u->name }}</a>
    @endforeach 
    </div>
</div>