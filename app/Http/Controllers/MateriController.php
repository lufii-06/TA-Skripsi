<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Kelas;
use App\Models\Pesan;
use App\Models\Materi;
use App\Models\Absensi;
use App\Models\AnggotaKelas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MateriController extends Controller
{
    public function index()
    {
        $user = auth::user();
        $kelas = Kelas::all();
        $anggotakelas = AnggotaKelas::where('user_id', $user->id)->pluck('kelas_id');
        $materi = Materi::with('user')->whereIn('kelas_id', $anggotakelas)->paginate(5);
        return view('materi.materi-index', compact('user', 'materi', 'kelas'));
    }

    public function create()
    {
        $user = auth::user();
        return view('materi.materi-create', compact('user'));
    }

    public function detail($id)
    {
        try {
            $materi = Materi::with('user')->where('id', $id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home')->withErrors('Materi tidak ditemukan.');
        }
        $user = auth::user();
        $absensi = Absensi::where('user_id', $user->id)->where('materi_id', $materi->id)->first();
        return view('materi.materi-detail', compact('materi', 'user', 'absensi'));
    }

    public function search()
    {
        $user = Auth::user();
        $anggotakelas = AnggotaKelas::where('user_id', $user->id)->pluck('kelas_id');
        $materi = Materi::with('user')->latest()->filter(request(['search']))->whereIn('kelas_id', $anggotakelas)->paginate(5);
        return view('materi.materi-index', compact('user', 'materi'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'level' => 'required|in:n5,n4,n3,n2,n1',
            'judul' => 'required|string|max:255',
            'isimateri' => 'required|string',
            'filemateri' => 'nullable|file|mimes:doc,docx,pdf|max:10240',
        ], [
            'level.required' => 'Level Materi harus diisi.',
            'level.in' => 'Anda Belum Memilih Level Materi',
            'judul.required' => 'Judul Materi harus diisi.',
            'isimateri.required' => 'Isi Materi harus diisi.',
            'filemateri.mimes' => 'File Materi harus berupa file dengan format: doc, docx, atau pdf.',
            'filemateri.max' => 'File Materi tidak boleh lebih dari 10MB.',
        ]);
        // Jika validasi gagal, kembali ke form dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = Auth::user();
        $kelas = Kelas::where('user_id', $user->id)->first();
        // Jika validasi berhasil, buat data materi
        $materi = new Materi;
        $materi->user_id = $user->id;
        $materi->kelas_id = $kelas->id;
        $materi->level = $request->level;
        $materi->judul = $request->judul;
        $materi->isimateri = $request->isimateri;

        if ($request->hasFile('filemateri')) {
            $file = $request->file('filemateri');
            $fileName = $file->getClientOriginalName();
            $filePath = public_path('materi_files');
            $file->move($filePath, $fileName);
            // $path = $file->storeAs('materi_files', $fileName, 'public');
            $materi->filemateri = 'materi_files/' . $fileName;
        }
        $materi->save();
        Pesan::create([
            'user_id' => $user->id,
            'pesan' => explode(' ', $user->name)[0] . ' Telah Mengupload Materi Baru' . ' Berjudul : ' . $materi->judul,
            'info' => 'materi-' . $materi->id
        ]);
        return redirect()->route('send.whatsapp');
    }

    public function destroy($id)
    {
        $materi = Materi::find($id);
        $materi->delete();
        return redirect()->route('materi')->with('success', 'telah menghapus materi');
    }

    public function cetakmateri(Request $request)
    {
        $periode = $request->periode;
        $tahun = $request->tahun;
        if ($periode == 'Genap') {
            $tanggal1 = $tahun . '-04-01';
            $tanggal2 = $tahun . '-09-30';
        } else {
            $tanggal1 = $tahun . '-10-1';
            $tanggal2 = $tahun + 1 . '-03-31';
        }
        $materi = Materi::with('kelas')->whereBetween('created_at', [$tanggal1, $tanggal2])->orderBy('level', 'desc')->get();
        if ($materi->isEmpty()) {
            return back()->with('error', 'materi Tidak Ada');
        } else {
            return view('materi.cetak', compact('materi', 'periode', 'tahun'));
        }
    }
    public function cetakmateriperkelas(Request $request)
    {
        $kelas = Kelas::with('materi', 'user')->where('id', $request->kelas)->get();
        if ($kelas->isEmpty()) {
            return back()->with('error', 'materi Tidak Ada');
        } else {
            return view('materi.cetakPerkelas', compact('kelas'));
        }
    }
}
