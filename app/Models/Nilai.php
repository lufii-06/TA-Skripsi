<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fililable = [
        'user_id',
        'kuis_id',
        'nilai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function Kuis()
    {
        return $this->belongsTo(Kuis::class,"kuis_id");
    }
}
