<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kelas_id',
        'type',
        'judulkuis',
        'jumlahsoal',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
    public function Persyaratan()
    {
        return $this->hasMany(Persyaratan::class);
    }

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('type', 'like', '%' . $search . '%')
                    ->orWhere('judulkuis', 'like', '%' . $search . '%')
                    ->orWhere('jumlahsoal', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%');
                    });

            });
        });
    }
}
