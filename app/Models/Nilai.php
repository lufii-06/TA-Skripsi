<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kuis_id',
        'nilai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function Kuis()
    {
        return $this->belongsTo(Kuis::class, "kuis_id");
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('nilai', 'like', '%' . $search . '%')
                    ->orWhereHas('kuis', function ($query) use ($search) {
                        $query->where('type', 'LIKE', '%' . $search . '%')
                            ->orWhere('judulkuis', 'like', '%' . $search . '%');
                    });

            });
        });
    }
}
