@extends('layouts.app')

@section('content')
    <div class="container py-16">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-black text-slate-900">Manajemen Stok Barang</h1>
                <p class="text-slate-500 mt-1">Kelola stok dan informasi peralatan camping & hiking</p>
            </div>
            <a href="{{ route('edit-stok.create') }}" class="btn btn-primary px-6">
                <i class="fa-solid fa-plus"></i> Tambah Barang Baru
            </a>
        </div>

        {{-- Alert Messages --}}
        @if(session('success'))
            <div class="alert alert-success flex items-center gap-3 mb-6">
                <i class="fa-solid fa-check-circle text-green-600"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger flex items-center gap-3 mb-6">
                <i class="fa-solid fa-circle-xmark text-red-600"></i>
                {{ session('error') }}
            </div>
        @endif

        {{-- Filter dan Search --}}
        <div class="card p-6 mb-8 border border-slate-100 bg-white shadow-sm">
            <form method="GET" action="{{ route('edit-stok.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                <div>
                    <label class="block mb-2 text-sm font-semibold text-slate-700">Cari Barang</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama barang..."
                        class="form-control">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-semibold text-slate-700">Filter Kondisi</label>
                    <select name="kondisi" class="form-control">
                        <option value="">Semua Kondisi</option>
                        <option value="Baik" {{ request('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Perlu Perawatan" {{ request('kondisi') == 'Perlu Perawatan' ? 'selected' : '' }}>Perlu Perawatan</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-semibold text-slate-700">Filter Stok</label>
                    <select name="stok_filter" class="form-control">
                        <option value="">Semua Stok</option>
                        <option value="tersedia" {{ request('stok_filter') == 'tersedia' ? 'selected' : '' }}>Tersedia (>0)</option>
                        <option value="habis" {{ request('stok_filter') == 'habis' ? 'selected' : '' }}>Habis (0)</option>
                        <option value="rendah" {{ request('stok_filter') == 'rendah' ? 'selected' : '' }}>Stok Rendah (<5)</option>
                    </select>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="btn btn-primary flex-grow">
                        <i class="fa-solid fa-magnifying-glass"></i> Filter
                    </button>
                    <a href="{{ route('edit-stok.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        </div>

        {{-- Statistics Cards --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="card p-6 text-center bg-white border border-slate-100">
                <div class="text-3xl font-black text-slate-800 mb-1">{{ $totalBarang }}</div>
                <div class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Total Barang</div>
            </div>
            <div class="card p-6 text-center bg-green-50 border border-green-100">
                <div class="text-3xl font-black text-green-700 mb-1">{{ $tersedia }}</div>
                <div class="text-xs font-semibold text-green-600 uppercase tracking-wide">Tersedia</div>
            </div>
            <div class="card p-6 text-center bg-amber-50 border border-amber-100">
                <div class="text-3xl font-black text-amber-700 mb-1">{{ $stokRendah }}</div>
                <div class="text-xs font-semibold text-amber-600 uppercase tracking-wide">Stok Rendah</div>
            </div>
            <div class="card p-6 text-center bg-red-50 border border-red-100">
                <div class="text-3xl font-black text-red-700 mb-1">{{ $habis }}</div>
                <div class="text-xs font-semibold text-red-600 uppercase tracking-wide">Habis</div>
            </div>
        </div>

        {{-- Tabel Stok Barang --}}
        <div class="table-responsive bg-white rounded-3xl p-2 border border-slate-100 shadow-sm">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Harga / Hari</th>
                        <th class="text-center">Stok</th>
                        <th>Kondisi</th>
                        <th>Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barang as $index => $item)
                        <tr>
                            <td class="text-slate-400">{{ $barang->firstItem() + $index }}</td>
                            <td>
                                <div class="flex items-center gap-3">
                                    @if($item->image)
                                        <img src="{{ $item->image_url }}" alt="{{ $item->nama }}"
                                            class="w-12 h-12 object-cover rounded-xl border border-slate-100">
                                    @else
                                        <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center text-xl">📦</div>
                                    @endif
                                    <span class="font-bold text-slate-800">{{ $item->nama }}</span>
                                </div>
                            </td>
                            <td class="text-green-600 font-bold">{{ $item->formatted_harga }}</td>
                            <td class="text-center">
                                @if($item->stok === 0)
                                    <span class="badge badge-danger">{{ $item->stok }} unit</span>
                                @elseif($item->stok < 5)
                                    <span class="badge badge-warning">{{ $item->stok }} unit</span>
                                @else
                                    <span class="badge badge-success">{{ $item->stok }} unit</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $item->kondisi == 'Baik' ? 'badge-success' : 'badge-warning' }}">
                                    {{ $item->kondisi }}
                                </span>
                            </td>
                            <td class="text-slate-500">{{ $item->kategori }}</td>
                            <td class="text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('edit-stok.edit', $item->id) }}" class="btn btn-sm bg-blue-100 hover:bg-blue-200 text-blue-700 border-0">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('edit-stok.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm bg-red-100 hover:bg-red-200 text-red-700 border-0">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-12 text-slate-400">
                                <i class="fa-solid fa-box-open text-3xl mb-3 block opacity-50"></i>
                                Tidak ada data barang ditemukan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $barang->links() }}
        </div>
    </div>
@endsection
