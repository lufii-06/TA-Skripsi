<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas_id',
        'user_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelas()
    {
        return $this->belongsTo(AnggotaKelas::class,'kelas_id');
    }
}
