@extends('layouts.app')

@section('content')
    <div class="auth-wrapper bg-slate-50 flex items-center justify-center min-h-[80vh] py-12 px-4 sm:px-6 lg:px-8">
        <div class="auth-card max-w-4xl w-full bg-white rounded-3xl shadow-xl overflow-hidden flex border border-slate-100">
            {{-- Image Side --}}
            <div class="auth-image hidden md:flex md:w-1/2 bg-gradient-to-br from-green-800 to-green-950 p-12 flex-col justify-end text-white relative">
                <div class="absolute inset-0 z-0">
                    <img src="{{ asset('img/gunung.jpeg') }}" alt="Gunung" class="w-full h-full object-cover opacity-20">
                </div>
                <div class="relative z-10">
                    <h3 class="text-3xl font-black mb-4">Mulai Perjalananmu</h3>
                    <p class="text-green-100/80 leading-relaxed text-sm">Bergabunglah dengan ribuan petualang lainnya dan nikmati kemudahan sewa alat camping.</p>
                </div>
            </div>

            {{-- Form Side --}}
            <div class="auth-form-container w-full md:w-1/2 p-8 sm:p-12 flex flex-col justify-center">
                <div class="auth-header mb-8">
                    <h2 class="text-2xl font-black text-slate-900 mb-2">Daftar Akun</h2>
                    <p class="text-slate-500 text-sm">Bergabunglah dengan komunitas petualang kami</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl text-sm">
                        <ul class="mb-0 pl-4 list-disc space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block mb-1.5 text-sm font-semibold text-slate-700">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-green-500 focus:ring-2 focus:ring-green-100 outline-none transition" placeholder="John Doe" required value="{{ old('name') }}">
                    </div>

                    <div>
                        <label class="block mb-1.5 text-sm font-semibold text-slate-700">Email Address</label>
                        <input type="email" name="email" class="form-control w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-green-500 focus:ring-2 focus:ring-green-100 outline-none transition" placeholder="nama@email.com" required value="{{ old('email') }}">
                    </div>

                    <div>
                        <label class="block mb-1.5 text-sm font-semibold text-slate-700">Password</label>
                        <input type="password" name="password" class="form-control w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-green-500 focus:ring-2 focus:ring-green-100 outline-none transition" placeholder="Minimal 8 karakter" required>
                    </div>

                    <div>
                        <label class="block mb-1.5 text-sm font-semibold text-slate-700">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-green-500 focus:ring-2 focus:ring-green-100 outline-none transition" placeholder="Ulangi password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-full py-3 font-bold shadow-md hover:shadow-lg transition">Daftar Sekarang</button>

                    <div class="text-center mt-6">
                        <p class="text-sm text-slate-500">Sudah punya akun? <a href="{{ route('login') }}" class="text-green-600 font-bold hover:underline">Masuk disini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
