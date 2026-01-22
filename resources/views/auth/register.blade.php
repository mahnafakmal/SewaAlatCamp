@extends('layouts.app')

@section('content')
    <div class="auth-wrapper">
        <div class="auth-card">
            <div class="auth-image">
                <div class="auth-image-content">
                    <h3>Mulai Perjalananmu</h3>
                    <p>Bergabunglah dengan ribuan petualang lainnya dan nikmati kemudahan sewa alat camping.</p>
                </div>
            </div>

            <div class="auth-form-container">
                <div class="auth-header">
                    <h2>Daftar Akun</h2>
                    <p>Bergabunglah dengan komunitas petualang kami</p>
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

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-2">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" placeholder="John Doe" required
                            value="{{ old('name') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="nama@email.com" required
                            value="{{ old('email') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Ulangi password" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mb-4">Daftar Sekarang</button>

                    <div class="text-center">
                        <p style="font-size: 0.9rem;">Sudah punya akun? <a href="{{ route('login') }}"
                                style="color: var(--primary-color); font-weight: 600;">Masuk disini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection