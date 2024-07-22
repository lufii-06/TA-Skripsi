<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\Kelas;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $nilai = Nilai::with('user')->where('kuis_id', $id)->get();
        return view('nilai.kuis-hasil', compact('user', 'kuis', 'nilai'));
    }

    public function nilaisearch()
    {
        $user = Auth::user();
        $nilai = Nilai::with('kuis')->where('user_id', $user->id)->latest()->filter(request(['search']))->paginate(5);
        return view('nilai.nilai-detail', compact('user', 'nilai'));
    }

    public function cetaknilaisiswa(Request $request)
    {
        $user = Auth::user();
        $periode = $request->periode;
        $tahun = $request->tahun;
        if ($periode == 'Genap') {
            $tanggal1 = $tahun . '-04-01';
            $tanggal2 = $tahun . '-09-30';
        } else {
            $tanggal1 = $tahun . '-10-1';
            $tanggal2 = $tahun + 1 . '-03-31';
        }
        $nilai = Nilai::with('user.detailuser', 'kuis.kelas')->whereBetween('created_at', [$tanggal1, $tanggal2])->where('user_id',$user->id)->get();
        if ($nilai->isEmpty()) {
            return back()->with('error', 'Rekap nilai Tidak Ada');
        } else {
            return view('nilai.cetaknilaisiswa', compact('nilai', 'periode', 'tahun'));
        }
    }

    public function cetakkuis($id)
    {
        $nilai = Nilai::with('user')->where('kuis_id', $id)->orderBy('nilai', 'desc')->get();
        $kuis = Kuis::find($id);
        return view('nilai.cetaknilaikuis', compact('kuis', 'nilai'));
    }
}
