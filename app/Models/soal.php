<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class soal extends Model
{
    use HasFactory;

    protected $fillable = [
        'kuid_id',
        'soal',
        'jawabanbenar',
        'jawaban1',
        'jawaban2',
        'jawaban3',
    ];

    public function Kuis()
    {
        return $this->belongsTo(Kuis::class,'kuis_id');
    }

    public function Jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}
