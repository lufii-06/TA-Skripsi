<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kuis_id',
        'materi_id',
    ];

    public function Materi()
    {
        return $this->belongsTo(Materi::class,'materi_id');
    }

    public function Kuis()
    {
        return $this->belongsTo(Kuis::class,'kuis_id');
    }
}
