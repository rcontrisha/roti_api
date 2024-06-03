<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $table = 'akun';
    public $timestamps = false; // Nonaktifkan timestamps jika tabel tidak memiliki kolom created_at dan updated_at
    protected $fillable = [
        'nama_user',
        'email',
        'username',
        'password',
        'posisi',
    ];

    protected $hidden = [
        'password',
    ];

    public function accessRights()
    {
        return $this->hasMany(AccessRight::class, 'username');
    }
}
