@extends('app')

@section('content')
<div class="container mt-5">
    <h3>Login</h3>

    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <form method="POST" action="/login">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button class="btn btn-primary">Login</button>
        <a href="/register">Register</a>
    </form>
</div>
@endsection
