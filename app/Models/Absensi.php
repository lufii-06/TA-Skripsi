<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'materi_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function Materi()
    {
        return $this->belongsTo(Materi::class,'materi_id');
    }
}
