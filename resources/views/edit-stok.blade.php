@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Manajemen Stok Barang</h1>
        <p class="text-gray-600">Kelola stok dan informasi peralatan camping & hiking</p>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
        {{ session('error') }}
    </div>
    @endif

    <!-- Filter dan Search -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form method="GET" action="{{ route('edit.stok') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Cari Barang</label>
                <input type="text" 
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Nama barang..."
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Filter Kondisi</label>
                <select name="kondisi" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Kondisi</option>
                    <option value="Baik" {{ request('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Perlu Perawatan" {{ request('kondisi') == 'Perlu Perawatan' ? 'selected' : '' }}>Perlu Perawatan</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Filter Stok</label>
                <select name="stok_filter" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Stok</option>
                    <option value="tersedia" {{ request('stok_filter') == 'tersedia' ? 'selected' : '' }}>Tersedia (>0)</option>
                    <option value="habis" {{ request('stok_filter') == 'habis' ? 'selected' : '' }}>Habis (0)</option>
                    <option value="rendah" {{ request('stok_filter') == 'rendah' ? 'selected' : '' }}>Stok Rendah (<5)</option>
                </select>
            </div>
            <div class="md:col-span-3 flex gap-2">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    🔍 Filter
                </button>
                <a href="{{ route('edit.stok') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                    Reset
                </a>
                <a href="{{ route('edit.stok.create') }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition ml-auto">
                    + Tambah Barang Baru
                </a>
            </div>
        </form>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-sm text-gray-600">Total Barang</div>
            <div class="text-2xl font-bold text-gray-800">{{ $totalBarang }}</div>
        </div>
        <div class="bg-green-50 rounded-lg shadow p-4">
            <div class="text-sm text-green-600">Tersedia</div>
            <div class="text-2xl font-bold text-green-700">{{ $tersedia }}</div>
        </div>
        <div class="bg-yellow-50 rounded-lg shadow p-4">
            <div class="text-sm text-yellow-600">Stok Rendah</div>
            <div class="text-2xl font-bold text-yellow-700">{{ $stokRendah }}</div>
        </div>
        <div class="bg-red-50 rounded-lg shadow p-4">
            <div class="text-sm text-red-600">Habis</div>
            <div class="text-2xl font-bold text-red-700">{{ $habis }}</div>
        </div>
    </div>

    <!-- Tabel Stok Barang -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Gambar</th>
                        <th class="px-4 py-3 text-left">Nama Peralatan</th>
                        <th class="px-4 py-3 text-left">Harga / Hari</th>
                        <th class="px-4 py-3 text-center">Stok</th>
                        <th class="px-4 py-3 text-left">Kondisi</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barang as $index => $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $barang->firstItem() + $index }}</td>
                        <td class="px-4 py-3">
                            @if($item->image)
                                <img src="{{ asset('storage/barang/' . $item->image) }}" 
                                     alt="{{ $item->nama }}"
                                     class="w-16 h-16 object-cover rounded">
                            @else
                                <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center text-gray-400">
                                    📦
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 font-medium">{{ $item->nama }}</td>
                        <td class="px-4 py-3 text-green-600 font-semibold">{{ $item->formatted_harga }}</td>
                        <td class="px-4 py-3 text-center">
                            @if($item->stok === 0)
                                <span class="text-red-600 font-semibold">
                                    {{ $item->stok }} unit
                                    <span class="block text-xs">(Habis)</span>
                                </span>
                            @elseif($item->stok < 5)
                                <span class="text-yellow-600 font-semibold">
                                    {{ $item->stok }} unit
                                    <span class="block text-xs">(Rendah)</span>
                                </span>
                            @else
                                <span class="text-green-600 font-semibold">{{ $item->stok }} unit</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full text-sm 
                                {{ $item->kondisi == 'Baik' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $item->kondisi }}
                            </span>
                        </td>
                        <td class="px-4 py-3">{{ $item->kategori }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('edit.stok.edit', $item->id) }}" 
                                   class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition text-sm">
                                    Edit
                                </a>
                                <form action="{{ route('edit.stok.destroy', $item->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus barang ini?')"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                            Tidak ada data barang ditemukan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-4 py-3 border-t">
            {{ $barang->links() }}
        </div>
    </div>
</div>
@endsection