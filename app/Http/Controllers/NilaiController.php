<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kuis;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kuis = Kuis::with('nilai')->where('user_id', $user->id)->where('status', 'telah selesai')->get();
        return view('nilai.nilai-index', compact('user', 'kuis'));
    }

    public function nilaisaya()
    {
        $user = Auth::user();
        $nilai = Nilai::with('kuis')->where('user_id', $user->id)->paginate(5);
        return view('nilai.nilai-detail', compact('user', 'nilai'));
    }

    public function detailkuis($id)
    {
        $user = Auth::user();
        $kuis = Kuis::find($id);
        $nilai = Nilai::where('kuis_id', $id)->get();
        return view('nilai.kuis-hasil', compact('user', 'kuis', 'nilai'));
    }

    public function nilaisearch()
    {
        $user = Auth::user();
        $nilai = Nilai::with('kuis')->where('user_id', $user->id)->latest()->filter(request(['search']))->paginate(5);
        return view('nilai.nilai-detail', compact('user', 'nilai'));
    }
}
