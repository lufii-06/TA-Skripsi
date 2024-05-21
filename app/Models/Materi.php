<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'level',
        'judul',
        'isimateri'
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('level', 'like', '%' . $search . '%')
                    ->orWhereHas('user' , function($query) use ($search){
                        $query->where('name','LIKE', '%' . $search . '%');
                    });
                    
            });
        });
    }
}
