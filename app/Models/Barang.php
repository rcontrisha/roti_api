<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang'; // Nama tabel di database
    protected $primaryKey = 'id_barang'; // Primary key di tabel
    public $timestamps = false; // Nonaktifkan timestamps jika tabel tidak memiliki kolom created_at dan updated_at

    protected $fillable = ['nama_barang', 'harga', 'stok', 'id_kategori'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
