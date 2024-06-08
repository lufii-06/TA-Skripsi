<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'token',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            do {
                $token = Str::random(10);
            } while (self::where('token', $token)->exists());
            $model->token = $token;
        });
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function anggotakelas()
    {
        return $this->hasMany(AnggotaKelas::class);
    }

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }

    public function kuis()
    {
        return $this->hasMany(Kuis::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        });
    }
}
