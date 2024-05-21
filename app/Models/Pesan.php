<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pesan',
        'info',
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
