<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailJawaban extends Model
{
    use HasFactory;

    protected $fillable = [
        'soal_id',
        'jawaban_id',
        'jawabanbenar'
    ];

    public function Jawaban()
    {
        return $this->belongsTo(Jawaban::class, "jawaban_id");
    }

    public function soal()
    {
        return $this->belongsTo(Soal::class, "soal_id");
    }
}
