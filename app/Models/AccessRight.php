<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessRight extends Model
{
    use HasFactory;

    protected $table = 'access_rights';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'username', 
        'can_manage_account', 
        'can_manage_items', 
        'can_manage_transactions', 
        'can_manage_reports'
    ];
    
    public function user()
    {
        return $this->belongsTo(Akun::class, 'username', 'username');
    }
}
