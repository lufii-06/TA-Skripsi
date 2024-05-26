<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Pesan;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MateriController extends Controller
{
    public function index()
    {
        $user = auth::user();
        $materi = Materi::with('user')->paginate(5);
        return view('materi.materi-index', compact('user', 'materi'));
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
        return view('materi.materi-detail', compact('user', 'materi'));
    }

    public function search()
    {
        $materi = Materi::latest()->filter(request(['search']))->paginate(5);
        $user = Auth::user();
        return view('materi.materi-index', compact('user', 'materi'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'level' => 'required|in:n5,n4,n3,n2,n1',
            'judul' => 'required|string|max:255',
            'isimateri' => 'required|string',
            'filemateri' => 'nullable|file|mimes:doc,docx,pdf|max:10240', // Validasi untuk filemateri
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


        // Jika validasi gagal, kembali ke form dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        // Jika validasi berhasil, buat data materi
        $materi = new Materi;
        $materi->user_id = $user->id;
        $materi->level = $request->level;
        $materi->judul = $request->judul;
        $materi->isimateri = $request->isimateri;

        if ($request->hasFile('filemateri')) {
            $file = $request->file('filemateri');
            $fileName = $file->getClientOriginalName(); 
            $path = $file->storeAs('materi_files', $fileName, 'public');
            $materi->filemateri = $path; 
        }
        
        $materi->save();
        Pesan::create([
            'user_id' => $user->id,
            'pesan' => explode(' ', $user->name)[0] . ' Telah Mengupload Materi Baru' . ' Berjudul : ' . $materi->judul,
            'info' => 'materi-' . $materi->id
        ]);

        return redirect()->route('send.whatsapp');
    }
}
