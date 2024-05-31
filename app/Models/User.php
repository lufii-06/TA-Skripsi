<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Pesan()
    {
        return $this->hasMany(Pesan::class);
    }

    public function Materi()
    {
        return $this->hasMany(Materi::class);
    }

    public function DetailUser()
    {
        return $this->hasOne(DetailUser::class);
    }
    public function Jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }

    public function Kuis()
    {
        return $this->hasMany(kuis::class);
    }

    public function Nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function Absensi()
    {
        return $this->hasMany(Absensi::class);
    }


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhereHas('detailuser', function ($query) use ($search) {
                        $query->where('alamat', 'LIKE', '%' . $search . '%')
                            ->orWhere('tempat_lahir', 'like', '%' . $search . '%')
                            ->orWhere('tanggal_lahir', 'like', '%' . $search . '%')
                            ->orWhere('nohp', 'like', '%' . $search . '%')
                            ->orWhere('tinggibadan', 'like', '%' . $search . '%')
                            ->orWhere('beratbadan', 'like', '%' . $search . '%')
                            ->orWhere('jurusan', 'like', '%' . $search . '%')
                            ->orWhere('pendidikanterakhir', 'like', '%' . $search . '%')
                            ->orWhere('levelkemampuan', 'like', '%' . $search . '%')
                            ->orWhere('usia', 'like', '%' . $search . '%');
                    });
            });
        });
    }
}
