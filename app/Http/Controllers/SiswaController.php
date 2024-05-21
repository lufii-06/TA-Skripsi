<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('siswa.siswa-index',compact('user'));
    }
}
