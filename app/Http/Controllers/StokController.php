<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = Barang::query();

            // Filter pencarian
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('kode', 'like', "%{$search}%");
            }

            // Filter kategori
            if ($request->has('kategori') && !empty($request->kategori)) {
                $query->where('kategori', $request->kategori);
            }

            // Filter status stok
            if ($request->has('status') && !empty($request->status)) {
                if ($request->status == 'habis') {
                    $query->where('stok', 0);
                } elseif ($request->status == 'tersedia') {
                    $query->where('stok', '>', 0);
                }
            }

            // Pagination
            $barang = $query->orderBy('created_at', 'desc')->paginate(15);

            // Statistics
            $totalBarang = Barang::count();
            $tersedia = Barang::where('stok', '>', 0)->count();
            $stokRendah = Barang::where('stok', '>', 0)->where('stok', '<', 5)->count();
            $habis = Barang::where('stok', 0)->count();

            return view('edit-stok', compact('barang', 'totalBarang', 'tersedia', 'stokRendah', 'habis'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-barang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'kondisi' => 'required|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('barang', 'public');
                $validated['image'] = basename($imagePath);
            }

            Barang::create($validated);
            return redirect()->route('edit-stok.index')->with('success', 'Barang berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan barang: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('edit-barang', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'kondisi' => 'required|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($barang->image && \Illuminate\Support\Facades\Storage::disk('public')->exists('barang/' . $barang->image)) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete('barang/' . $barang->image);
                }

                $imagePath = $request->file('image')->store('barang', 'public');
                $validated['image'] = basename($imagePath);
            }

            $barang->update($validated);
            return redirect()->route('edit-stok.index')->with('success', 'Barang berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui barang: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage (Soft Delete).
     */
    public function destroy($id)
    {
        try {
            $barang = Barang::findOrFail($id);
            $barang->delete(); // Soft delete
            return redirect()->route('edit-stok.index')->with('success', 'Barang berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus barang: ' . $e->getMessage());
        }
    }

    /**
     * Restore soft deleted resource.
     */
    public function restore($id)
    {
        try {
            $barang = Barang::withTrashed()->findOrFail($id);
            $barang->restore();
            return redirect()->route('edit-stok.index')->with('success', 'Barang berhasil dipulihkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memulihkan barang: ' . $e->getMessage());
        }
    }

    /**
     * Permanently delete resource.
     */
    public function forceDelete($id)
    {
        try {
            $barang = Barang::withTrashed()->findOrFail($id);
            $barang->forceDelete();
            return redirect()->route('edit-stok.index')->with('success', 'Barang berhasil dihapus permanen');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus barang: ' . $e->getMessage());
        }
    }

    /**
     * Get barang data for API (JSON).
     */
    public function getBarangData(Request $request)
    {
        try {
            $barang = Barang::select('id', 'nama', 'stok', 'harga')
                ->orderBy('nama')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $barang
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}