<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori'; // Nama tabel di database
    protected $primaryKey = 'id_kategori'; // Primary key di tabel
    public $timestamps = false; // Nonaktifkan timestamps jika tabel tidak memiliki kolom created_at dan updated_at

    protected $fillable = ['nama_kategori'];

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'id_kategori');
    }
}
