<?php

namespace App\Models;

use DASPRiD\Enum\AbstractEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'level',
        'judul',
        'isimateri',
        'filemateri'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('level', 'like', '%' . $search . '%')
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%');
                    });

            });
        });
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($materi) {
            if ($materi->filemateri) {
                Storage::delete('public/' . $materi->filemateri);
            }
        });
    }

}
