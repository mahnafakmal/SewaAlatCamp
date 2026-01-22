@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div class="container">
            <h1>Edit Barang</h1>
            <p>Perbarui informasi peralatan camping & hiking.</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="card p-5 shadow-lg" style="max-width: 900px; margin: 0 auto; border: none;">

            @if($errors->any())
                <div class="alert alert-danger mb-4"
                    style="background-color: #fef2f2; color: #991b1b; padding: 1rem; border-radius: 0.5rem; border: 1px solid #fecaca;">
                    <ul class="mb-0 pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('edit-stok.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid mb-4" style="grid-template-columns: 2fr 1fr; gap: 2rem;">
                    <div>
                        <div class="form-group mb-4">
                            <label class="block mb-2 font-weight-bold">Nama Barang</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama', $barang->nama) }}"
                                required placeholder="Contoh: Tenda Dhaulagiri">
                        </div>

                        <div class="grid mb-4" style="grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="form-group">
                                <label class="block mb-2 font-weight-bold">Kategori</label>
                                <select name="kategori" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach(['Tenda', 'Sleeping Bag', 'Carrier', 'Kompor', 'Peralatan Masak', 'Perlengkapan', 'Lainnya'] as $cat)
                                        <option value="{{ $cat }}" {{ old('kategori', $barang->kategori) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="block mb-2 font-weight-bold">Kondisi</label>
                                <select name="kondisi" class="form-control" required>
                                    <option value="Baik" {{ old('kondisi', $barang->kondisi) == 'Baik' ? 'selected' : '' }}>
                                        Baik</option>
                                    <option value="Perlu Perawatan" {{ old('kondisi', $barang->kondisi) == 'Perlu Perawatan' ? 'selected' : '' }}>Perlu Perawatan</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid mb-4" style="grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="form-group">
                                <label class="block mb-2 font-weight-bold">Stok</label>
                                <input type="number" name="stok" class="form-control"
                                    value="{{ old('stok', $barang->stok) }}" min="0" required>
                            </div>

                            <div class="form-group">
                                <label class="block mb-2 font-weight-bold">Harga Sewa / Hari (Rp)</label>
                                <input type="number" name="harga" class="form-control"
                                    value="{{ old('harga', $barang->harga) }}" min="0" required>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="block mb-2 font-weight-bold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4"
                                placeholder="Deskripsi detail barang...">{{ old('deskripsi', $barang->deskripsi ?? '') }}</textarea>
                        </div>
                    </div>

                    {{-- Right Column: Image --}}
                    <div>
                        <div class="form-group mb-4">
                            <label class="block mb-2 font-weight-bold">Gambar Barang</label>

                            <div class="mb-3 p-2 border rounded text-center bg-light">
                                <img src="{{ $barang->image_url }}" alt="Preview" class="img-fluid"
                                    style="max-height: 200px; width: auto; display: inline-block;">
                            </div>

                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted d-block mt-2">Format: JPG, PNG, JPEG. Max: 2MB. Biarkan kosong jika
                                tidak ingin mengubah.</small>
                        </div>
                    </div>
                </div>

                <div class="border-top pt-4 text-right" style="display: flex; justify-content: flex-end; gap: 1rem;">
                    <a href="{{ route('edit-stok.index') }}" class="btn btn-secondary px-4">Batal</a>
                    <button type="submit" class="btn btn-primary px-4"> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection