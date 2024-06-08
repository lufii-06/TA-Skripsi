<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_nomor',
        'jenkel',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'usia',
        'pendidikanterakhir',
        'jurusan',
        'tinggibadan',
        'beratbadan',
        'nohp',
        'budayaJepang',
        'pergiKeluarNegri',
        'tindikTato',
        'bekerjaTekanan',
        'orangTuaMasihAda',
        'orangTuaTahu',
        'kemauanSendiri',
        'cacatTubuh',
        'rabunButaWarna',
        'gigiPalsu',
        'soal1',
        'soal2',
        'levelkemampuan',
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
