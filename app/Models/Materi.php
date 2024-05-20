<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'isimateri'
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
