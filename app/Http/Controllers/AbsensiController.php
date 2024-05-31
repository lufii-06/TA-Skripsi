<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function absen($id){
        $user_id = Auth::id();
        Absensi::create([
            'user_id' =>$user_id,
            'materi_id'=>$id
        ]);
        return back()->with('success','Telah Mengisi Absen');
    }
}
