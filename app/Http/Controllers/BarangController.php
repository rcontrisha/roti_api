<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan semua data barang
    public function index()
    {
        $barangs = Barang::all();
        return response()->json($barangs);
    }

    // Menambah data barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        $barang = Barang::create($request->only(['nama_barang', 'harga', 'stok', 'id_kategori']));

        return response()->json($barang, 201);
    }

    // Mengupdate data barang berdasarkan ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'sometimes|string|max:100',
            'harga' => 'sometimes|numeric',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->only(['nama_barang', 'harga', 'id_kategori']));
        return response()->json($barang);
    }

    // Menghapus data barang berdasarkan ID
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return response()->json(['message' => 'Barang deleted successfully']);
    }

    // Mengubah stok barang berdasarkan ID
    public function updateStock(Request $request, $id)
    {
        $request->validate([
            'stok' => 'required|integer',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update(['stok' => $request->stok]);
        return response()->json($barang);
    }
}
