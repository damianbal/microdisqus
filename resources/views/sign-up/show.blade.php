@extends('layouts.master') 
@section('content')
<div class="card mx-auto w-50 bg-light p-1">
    <div class="card-body">
        <form method="POST" action="{{ route('sign-up.submit') }}">
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" placeholder="Your name" name="name" minlength="3" required>
                <small class="text-muted">This will be your display name</small>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" placeholder="Your email" minlength="3" name="email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" placeholder="Your password" minlength="3" name="password" required>
            </div>

            <button type="submit" class="btn  btn-sm btn-primary">Sign up</button>
        </form>
    </div>
</div>
@endsection