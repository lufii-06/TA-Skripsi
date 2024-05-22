<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{

    public function index(){
        $user = Auth::user();
        $siswa = User::with('DetailUser')->where('status','1')->get();
        return view('siswa.siswa-index',compact('user','siswa'));

    }
    public function search(){
        $user = Auth::user();
        $siswa = User::latest()->filter(request(['search']))->where('status','1')->get();
        return view('siswa.siswa-index',compact('user','siswa'));
    }
}
