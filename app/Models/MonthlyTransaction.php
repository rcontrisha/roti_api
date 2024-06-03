<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyTransaction extends Model
{
    use HasFactory;

    protected $table = 'monthly_transactions'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key di tabel
    public $timestamps = false; // Nonaktifkan timestamps jika tabel tidak memiliki kolom created_at dan updated_at

    protected $fillable = ['month', 'total', 'average'];

    // Tambahkan relasi atau method lainnya jika diperlukan
}
