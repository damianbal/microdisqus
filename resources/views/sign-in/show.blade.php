@extends('layouts.master') 
@section('content')
<div class="card mx-auto w-50 bg-light p-1">
    <div class="card-body">
        <form method="POST" action="{{ route('sign-in.submit') }}">
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" placeholder="Your email" name="email" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" placeholder="Your password" name="password" required>
            </div>

            <button type="submit" class="btn  btn-sm btn-primary"><i class="fas fa-sign-in-alt"></i> Sign in</button>

            <small>Do you need an account? <a href="{{ route('sign-up.show') }}"><i class="fas fa-user-plus"></i> Sign up</a></small>
        </form>
    </div>
</div>
@endsection