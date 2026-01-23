@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="mb-4">
            <h1 class="mb-2">Manajemen Stok Barang</h1>
            <p style="color: #6b7280;">Kelola stok dan informasi peralatan camping & hiking</p>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
            <div
                style="background-color: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; border: 1px solid #a7f3d0;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div
                style="background-color: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; border: 1px solid #fecaca;">
                {{ session('error') }}
            </div>
        @endif

        <!-- Filter dan Search -->
        <div class="card p-4 mb-4">
            <form method="GET" action="{{ route('edit-stok.index') }}" class="grid"
                style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; align-items: end;">
                <div>
                    <label class="block mb-2 font-weight-bold">Cari Barang</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama barang..."
                        class="form-control">
                </div>
                <div>
                    <label class="block mb-2 font-weight-bold">Filter Kondisi</label>
                    <select name="kondisi" class="form-control">
                        <option value="">Semua Kondisi</option>
                        <option value="Baik" {{ request('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Perlu Perawatan" {{ request('kondisi') == 'Perlu Perawatan' ? 'selected' : '' }}>Perlu
                            Perawatan</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-2 font-weight-bold">Filter Stok</label>
                    <select name="stok_filter" class="form-control">
                        <option value="">Semua Stok</option>
                        <option value="tersedia" {{ request('stok_filter') == 'tersedia' ? 'selected' : '' }}>Tersedia (>0)
                        </option>
                        <option value="habis" {{ request('stok_filter') == 'habis' ? 'selected' : '' }}>Habis (0)</option>
                        <option value="rendah" {{ request('stok_filter') == 'rendah' ? 'selected' : '' }}>Stok Rendah (<5)<
                                /option>
                    </select>
                </div>
                <div style="display: flex; gap: 0.5rem;">
                    <button type="submit" class="btn btn-primary">
                        🔍 Filter
                    </button>
                    <a href="{{ route('edit-stok.index') }}" class="btn btn-secondary">
                        Reset
                    </a>
                </div>
            </form>
            <div class="mt-4 text-right" style="text-align: right;">
                <a href="{{ route('edit-stok.create') }}" class="btn btn-primary">
                    + Tambah Barang Baru
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid mb-4" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
            <div class="card p-4">
                <div style="font-size: 0.875rem; color: #4b5563;">Total Barang</div>
                <div style="font-size: 1.5rem; font-weight: bold; color: #1f2937;">{{ $totalBarang }}</div>
            </div>
            <div class="card p-4" style="background-color: #f0fdf4;">
                <div style="font-size: 0.875rem; color: #166534;">Tersedia</div>
                <div style="font-size: 1.5rem; font-weight: bold; color: #15803d;">{{ $tersedia }}</div>
            </div>
            <div class="card p-4" style="background-color: #fffbeb;">
                <div style="font-size: 0.875rem; color: #854d0e;">Stok Rendah</div>
                <div style="font-size: 1.5rem; font-weight: bold; color: #a16207;">{{ $stokRendah }}</div>
            </div>
            <div class="card p-4" style="background-color: #fef2f2;">
                <div style="font-size: 0.875rem; color: #991b1b;">Habis</div>
                <div style="font-size: 1.5rem; font-weight: bold; color: #b91c1c;">{{ $habis }}</div>
            </div>
        </div>

        <!-- Tabel Stok Barang -->
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Peralatan</th>
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
                            <td>{{ $barang->firstItem() + $index }}</td>
                            <td>
                                @if($item->image)
                                    <img src="{{ $item->image_url }}" alt="{{ $item->nama }}"
                                        style="width: 4rem; height: 4rem; object-fit: cover; border-radius: 0.25rem;">
                                @else
                                    <div
                                        style="width: 4rem; height: 4rem; background-color: #e5e7eb; border-radius: 0.25rem; display: flex; align-items: center; justify-content: center; color: #9ca3af; font-size: 1.5rem;">
                                        📦
                                    </div>
                                @endif
                            </td>
                            <td style="font-weight: 500;">{{ $item->nama }}</td>
                            <td style="color: var(--primary-color); font-weight: 600;">{{ $item->formatted_harga }}</td>
                            <td class="text-center">
                                @if($item->stok === 0)
                                    <span class="badge" style="background-color: #fef2f2; color: #991b1b;">
                                        {{ $item->stok }} unit
                                        <span style="display: block; font-size: 0.75rem;">(Habis)</span>
                                    </span>
                                @elseif($item->stok < 5)
                                    <span class="badge badge-warning">
                                        {{ $item->stok }} unit
                                        <span style="display: block; font-size: 0.75rem;">(Rendah)</span>
                                    </span>
                                @else
                                    <span class="badge badge-success">{{ $item->stok }} unit</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $item->kondisi == 'Baik' ? 'badge-success' : 'badge-warning' }}">
                                    {{ $item->kondisi }}
                                </span>
                            </td>
                            <td>{{ $item->kategori }}</td>
                            <td class="text-center">
                                <div style="display: flex; justify-content: center; gap: 0.5rem;">
                                    <a href="{{ route('edit-stok.edit', $item->id) }}" class="btn btn-secondary btn-sm"
                                        style="background-color: #3b82f6; color: white; border: none;">
                                        Edit
                                    </a>
                                    <form action="{{ route('edit-stok.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus barang ini?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-secondary btn-sm"
                                            style="background-color: #ef4444; color: white; border: none;">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5" style="color: #6b7280;">
                                Tidak ada data barang ditemukan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-end custom-pagination">
            {{ $barang->links() }}
        </div>
    </div>

<style>
    /* Pagination Sizing Override */
    .custom-pagination nav[role="navigation"] div, 
    .custom-pagination .pagination {
        font-size: 0.85rem !important;
    }
    .custom-pagination nav[role="navigation"] a, 
    .custom-pagination nav[role="navigation"] span {
        padding: 0.25rem 0.6rem !important;
        font-size: 0.85rem !important;
        line-height: 1.5 !important;
    }
    .custom-pagination svg {
        width: 16px !important;
        height: 16px !important;
    }
    .custom-pagination .page-item .page-link {
        padding: 0.25rem 0.5rem !important;
        font-size: 0.85rem !important;
    }
</style>
@endsection