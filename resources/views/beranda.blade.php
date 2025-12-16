@extends('layouts.app')


@section('content')
<section class="relative">
<div class="h-[60vh] bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee');">
<div class="absolute inset-0 bg-black/60 flex items-center">
<div class="max-w-3xl px-6">
<h2 class="text-4xl font-bold text-green-400 mb-4">Persewaan Peralatan Camping & Hiking</h2>
<p class="text-gray-200">Menyediakan tenda, alat masak, tas carrier, dan perlengkapan outdoor lainnya.</p>
</div>
</div>
</div>
</section>


<section class="max-w-7xl mx-auto px-6 py-12">
<h3 class="text-2xl font-semibold mb-6">Daftar Harga Sewa</h3>
<div class="overflow-x-auto">
<table class="w-full text-sm border border-gray-700">
<thead class="bg-gray-800">
<tr>
<th class="p-3 border">No</th>
<th class="p-3 border">Nama Barang</th>
<th class="p-3 border">Harga / Malam</th>
</tr>
</thead>
<tbody>
<tr class="hover:bg-gray-800">
<td class="p-3 border">1</td>
<td class="p-3 border">Tenda Dome 4 Orang</td>
<td class="p-3 border">Rp35.000</td>
</tr>
<tr class="hover:bg-gray-800">
<td class="p-3 border">2</td>
<td class="p-3 border">Carrier 60L</td>
<td class="p-3 border">Rp20.000</td>
</tr>
<tr class="hover:bg-gray-800">
<td class="p-3 border">3</td>
<td class="p-3 border">Kompor Portable</td>
<td class="p-3 border">Rp10.000</td>
</tr>
</tbody>
</table>
</div>
</section>
@endsection