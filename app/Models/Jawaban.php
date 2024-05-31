<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kuis_id',
        'status',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function Kuis()
    {
        return $this->belongsTo(Kuis::class, "kuis_id");
    }

    public function DetailJawaban()
    {
        return $this->hasMany(DetailJawaban::class);
    }
}
