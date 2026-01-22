@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div class="container">
            <h1>Tambah Barang Baru</h1>
            <p>Masukkan informasi peralatan camping baru ke dalam sistem.</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="card p-5 shadow-lg" style="max-width: 900px; margin: 0 auto; border: none;">
            
            @if($errors->any())
                <div class="alert alert-danger mb-4" style="background-color: #fef2f2; color: #991b1b; padding: 1rem; border-radius: 0.5rem; border: 1px solid #fecaca;">
                    <ul class="mb-0 pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('edit-stok.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid mb-4" style="grid-template-columns: 2fr 1fr; gap: 2rem;">
                    <div>
                        <div class="form-group mb-4">
                            <label class="block mb-2 font-weight-bold">Nama Barang</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required placeholder="Contoh: Tenda Dhaulagiri">
                        </div>

                         <div class="grid mb-4" style="grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="form-group">
                                <label class="block mb-2 font-weight-bold">Kategori</label>
                                <select name="kategori" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach(['Tenda', 'Sleeping Bag', 'Carrier', 'Kompor', 'Peralatan Masak', 'Perlengkapan', 'Lainnya'] as $cat)
                                        <option value="{{ $cat }}" {{ old('kategori') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="block mb-2 font-weight-bold">Kondisi</label>
                                <select name="kondisi" class="form-control" required>
                                    <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Perlu Perawatan" {{ old('kondisi') == 'Perlu Perawatan' ? 'selected' : '' }}>Perlu Perawatan</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid mb-4" style="grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="form-group">
                                <label class="block mb-2 font-weight-bold">Stok</label>
                                <input type="number" name="stok" class="form-control" value="{{ old('stok', 0) }}" min="0" required>
                            </div>

                            <div class="form-group">
                                <label class="block mb-2 font-weight-bold">Harga Sewa / Hari (Rp)</label>
                                <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" min="0" required>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="block mb-2 font-weight-bold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4" placeholder="Deskripsi detail barang...">{{ old('deskripsi') }}</textarea>
                        </div>
                    </div>

                    {{-- Right Column: Image --}}
                    <div>
                        <div class="form-group mb-4">
                            <label class="block mb-2 font-weight-bold">Gambar Barang</label>
                            
                            <div class="mb-3 p-4 border rounded text-center bg-light" style="min-height: 200px; display: flex; align-items: center; justify-content: center; color: #9ca3af; flex-direction: column;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mb-2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                <span>Preview</span>
                            </div>
                            
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted d-block mt-2">Format: JPG, PNG, JPEG. Max: 2MB.</small>
                        </div>
                    </div>
                </div>

                <div class="border-top pt-4 text-right" style="display: flex; justify-content: flex-end; gap: 1rem;">
                    <a href="{{ route('edit-stok.index') }}" class="btn btn-secondary px-4">Batal</a>
                    <button type="submit" class="btn btn-primary px-4"> Simpan Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection
