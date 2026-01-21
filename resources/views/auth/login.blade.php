@extends('layouts.app')

@section('content')
    <div class="auth-container">
        <div class="auth-header">
            <h2>Login</h2>
            <p>Masuk untuk memulai petualanganmu</p>
        </div>

        @if($errors->any())
            <div
                style="background-color: #fef2f2; color: #991b1b; padding: 10px; border-radius: 6px; margin-bottom: 1rem; border: 1px solid #fecaca;">
                <ul style="margin-left: 1.5rem; list-style-type: disc;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 font-weight-bold">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="nama@email.com" required autofocus>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-weight-bold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="********" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Masuk Sekarang</button>

            <div class="text-center">
                <p style="font-size: 0.9rem;">Belum punya akun? <a href="{{ route('register') }}"
                        style="color: var(--primary-color); font-weight: 600;">Daftar disini</a></p>
            </div>
        </form>
    </div>
@endsection