<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'soal_id',
        'jawabanbenar',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function Soal()
    {
        return $this->belongsTo(Soal::class, "soal_id");
    }
}
