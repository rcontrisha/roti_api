<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan semua data kategori
    public function index()
    {
        $kategoris = Kategori::all();
        return response()->json($kategoris);
    }

    // Menambah data kategori baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        // Membuat kategori baru
        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return response()->json($kategori, 201); // 201 Created
    }

    // Mengupdate data kategori berdasarkan ID
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        return response()->json($kategori);
    }

    // Menghapus data kategori berdasarkan ID
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return response()->json(['message' => 'Kategori deleted successfully']);
    }
}
