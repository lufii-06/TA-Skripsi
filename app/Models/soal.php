<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $fillable = [
        'kuis_id',
        'soal',
        'jawabanbenar',
        'jawabansatu',
        'jawabandua',
        'jawabantiga',
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
