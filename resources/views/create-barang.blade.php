@extends('layouts.app')

@section('content')
    <div class="page-header text-center">
        <div class="container">
            <h1 class="text-white text-3xl mb-4">Tambah Barang Baru</h1>
            <p class="text-green-200 text-base max-w-xl mx-auto">Masukkan informasi peralatan camping baru ke dalam sistem.</p>
        </div>
    </div>

    <div class="container py-16 pb-24">
        <div class="card p-8 sm:p-10 shadow-lg border border-slate-100 bg-white rounded-3xl max-w-4xl mx-auto">

            @if($errors->any())
                <div class="alert alert-danger mb-6">
                    <ul class="mb-0 pl-4 list-disc text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('edit-stok.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    {{-- Left Column: Form Fields --}}
                    <div class="md:col-span-2 space-y-5">
                        <div>
                            <label class="block mb-2 text-sm font-semibold text-slate-700">Nama Barang</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required placeholder="Contoh: Tenda Dhaulagiri">
                        </div>

                         <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Kategori</label>
                                <select name="kategori" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach(['Tenda', 'Sleeping Bag', 'Carrier', 'Kompor', 'Peralatan Masak', 'Perlengkapan', 'Lainnya'] as $cat)
                                        <option value="{{ $cat }}" {{ old('kategori') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Kondisi</label>
                                <select name="kondisi" class="form-control" required>
                                    <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Perlu Perawatan" {{ old('kondisi') == 'Perlu Perawatan' ? 'selected' : '' }}>Perlu Perawatan</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Stok</label>
                                <input type="number" name="stok" class="form-control" value="{{ old('stok', 0) }}" min="0" required>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Harga Sewa / Hari (Rp)</label>
                                <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" min="0" required>
                            </div>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-semibold text-slate-700">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4" placeholder="Deskripsi detail barang...">{{ old('deskripsi') }}</textarea>
                        </div>
                    </div>

                    {{-- Right Column: Image Preview Placeholder & Upload --}}
                    <div>
                        <div class="space-y-4">
                            <label class="block text-sm font-semibold text-slate-700">Gambar Barang</label>

                            <div class="p-6 border-2 border-dashed border-slate-200 rounded-2xl bg-slate-50 flex flex-col items-center justify-center min-h-[220px] text-slate-400">
                                <i class="fa-solid fa-cloud-arrow-up text-3xl mb-3"></i>
                                <span class="text-sm font-medium">Upload Gambar</span>
                            </div>

                            <input type="file" name="image" class="form-control" accept="image/*" required>
                            <p class="text-xs text-slate-400 leading-normal">Format: JPG, PNG, JPEG. Maksimal 2MB.</p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-100 pt-6 flex justify-end gap-3">
                    <a href="{{ route('edit-stok.index') }}" class="btn btn-secondary px-6">Batal</a>
                    <button type="submit" class="btn btn-primary px-8">Simpan Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection
