@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="card p-5" style="max-width: 800px; margin: 0 auto;">
            <div class="mb-4 text-center">
                <h2 style="color: var(--primary-color);">Edit Barang</h2>
                <p style="color: #6b7280;">Perbarui informasi peralatan camping</p>
            </div>

            @if($errors->any())
                <div
                    style="background-color: #fef2f2; color: #991b1b; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; border: 1px solid #fecaca;">
                    <ul style="margin-left: 1.5rem; list-style-type: disc;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('edit-stok.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid mb-4" style="grid-template-columns: 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label class="block mb-2 font-weight-bold">Nama Barang</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $barang->nama) }}"
                            required>
                    </div>
                </div>

                <div class="grid mb-4" style="grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label class="block mb-2 font-weight-bold">Kategori</label>
                        <select name="kategori" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Tenda" {{ old('kategori', $barang->kategori) == 'Tenda' ? 'selected' : '' }}>Tenda
                            </option>
                            <option value="Sleeping Bag" {{ old('kategori', $barang->kategori) == 'Sleeping Bag' ? 'selected' : '' }}>Sleeping Bag</option>
                            <option value="Carrier" {{ old('kategori', $barang->kategori) == 'Carrier' ? 'selected' : '' }}>
                                Carrier</option>
                            <option value="Kompor" {{ old('kategori', $barang->kategori) == 'Kompor' ? 'selected' : '' }}>
                                Kompor</option>
                            <option value="Peralatan Masak" {{ old('kategori', $barang->kategori) == 'Peralatan Masak' ? 'selected' : '' }}>Peralatan Masak</option>
                            <option value="Perlengkapan" {{ old('kategori', $barang->kategori) == 'Perlengkapan' ? 'selected' : '' }}>Perlengkapan</option>
                            <option value="Lainnya" {{ old('kategori', $barang->kategori) == 'Lainnya' ? 'selected' : '' }}>
                                Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="block mb-2 font-weight-bold">Kondisi</label>
                        <select name="kondisi" class="form-control" required>
                            <option value="Baik" {{ old('kondisi', $barang->kondisi) == 'Baik' ? 'selected' : '' }}>Baik
                            </option>
                            <option value="Perlu Perawatan" {{ old('kondisi', $barang->kondisi) == 'Perlu Perawatan' ? 'selected' : '' }}>Perlu Perawatan</option>
                        </select>
                    </div>
                </div>

                <div class="grid mb-4" style="grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label class="block mb-2 font-weight-bold">Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ old('stok', $barang->stok) }}"
                            min="0" required>
                    </div>

                    <div class="form-group">
                        <label class="block mb-2 font-weight-bold">Harga Sewa / Hari (Rp)</label>
                        <input type="number" name="harga" class="form-control" value="{{ old('harga', $barang->harga) }}"
                            min="0" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block mb-2 font-weight-bold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"
                        rows="3">{{ old('deskripsi', $barang->deskripsi ?? '') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block mb-2 font-weight-bold">Gambar Barang</label>
                    @if($barang->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/barang/' . $barang->image) }}" alt="Current Image"
                                style="height: 100px; border-radius: 4px;">
                            <p style="font-size: 0.8rem; color: #6b7280;">Gambar saat ini</p>
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <small style="color: #6b7280;">Biarkan kosong jika tidak ingin mengubah gambar. Format: JPG, PNG, JPEG.
                        Max: 2MB</small>
                </div>

                <div class="text-right mt-5" style="display: flex; justify-content: flex-end; gap: 1rem;">
                    <a href="{{ route('edit-stok.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection