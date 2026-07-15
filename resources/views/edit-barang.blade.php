@extends('layouts.app')

@section('content')
    <div class="page-header text-center">
        <div class="container">
            <h1 class="text-white text-3xl mb-4">Edit Peralatan</h1>
            <p class="text-green-200 text-base max-w-xl mx-auto">Perbarui informasi detail peralatan camping & hiking.</p>
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

            <form action="{{ route('edit-stok.update', $barang->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    {{-- Left Column: Form Fields --}}
                    <div class="md:col-span-2 space-y-5">
                        <div>
                            <label class="block mb-2 text-sm font-semibold text-slate-700">Nama Barang</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama', $barang->nama) }}"
                                required placeholder="Contoh: Tenda Dhaulagiri">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Kategori</label>
                                <select name="kategori" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach(['Tenda', 'Sleeping Bag', 'Carrier', 'Kompor', 'Peralatan Masak', 'Perlengkapan', 'Lainnya'] as $cat)
                                        <option value="{{ $cat }}" {{ old('kategori', $barang->kategori) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Kondisi</label>
                                <select name="kondisi" class="form-control" required>
                                    <option value="Baik" {{ old('kondisi', $barang->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Perlu Perawatan" {{ old('kondisi', $barang->kondisi) == 'Perlu Perawatan' ? 'selected' : '' }}>Perlu Perawatan</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Stok</label>
                                <input type="number" name="stok" class="form-control" value="{{ old('stok', $barang->stok) }}" min="0" required>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Harga Sewa / Hari (Rp)</label>
                                <input type="number" name="harga" class="form-control" value="{{ old('harga', $barang->harga) }}" min="0" required>
                            </div>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-semibold text-slate-700">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4" placeholder="Deskripsi detail barang...">{{ old('deskripsi', $barang->deskripsi ?? '') }}</textarea>
                        </div>
                    </div>

                    {{-- Right Column: Image Preview & Upload --}}
                    <div>
                        <div class="space-y-4">
                            <label class="block text-sm font-semibold text-slate-700">Gambar Barang</label>

                            <div class="p-3 border border-slate-200 rounded-2xl bg-slate-50 flex items-center justify-center min-h-[200px] overflow-hidden">
                                <img src="{{ $barang->image_url }}" alt="Preview" class="rounded-xl max-h-[220px] w-auto object-contain">
                            </div>

                            <input type="file" name="image" class="form-control" accept="image/*">
                            <p class="text-xs text-slate-400 leading-normal">Format: JPG, PNG, JPEG. Maksimal 2MB. Biarkan kosong jika tidak ingin diubah.</p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-100 pt-6 flex justify-end gap-3">
                    <a href="{{ route('edit-stok.index') }}" class="btn btn-secondary px-6">Batal</a>
                    <button type="submit" class="btn btn-primary px-8">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
