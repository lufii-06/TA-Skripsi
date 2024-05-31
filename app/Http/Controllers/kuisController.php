<?php

namespace App\Http\Controllers;

use App\Models\DetailJawaban;
use App\Models\Jawaban;
use App\Models\Kuis;
use App\Models\Soal;
use App\Models\Pesan;
use App\Models\Materi;
use App\Models\Absensi;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class kuisController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->status == '1') {
            $kuis = Kuis::with('user', 'persyaratan.materi.absensi')->paginate(5);
            return view('kuis.kuis-index', compact('user', 'kuis'));
        } else {
            $kuis = Kuis::with('user', 'persyaratan.materi.absensi')->where('user_id', $user->id)->paginate(5);
            $syaratmateri = Materi::all();
            return view('kuis.kuis-index', compact('user', 'kuis', 'syaratmateri'));
        }
    }

    public function search()
    {
        $user = Auth::user();
        if ($user->status == '1') {
            $kuis = Kuis::with('user', 'persyaratan.materi.absensi')->latest()->filter(request(['search']))->paginate(5);
            return view('kuis.kuis-index', compact('user', 'kuis'));
        } else {
            $kuis = Kuis::with('user', 'persyaratan.materi.absensi')->latest()->filter(request(['search']))->where('user_id', $user->id)->paginate(5);
            $syaratmateri = Materi::all();
            return view('kuis.kuis-index', compact('user', 'kuis', 'syaratmateri'));
        }
    }



    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:TANGO,BUNPOU,CHOKAI,DOKKAI',
            'judulkuis' => 'required|string|max:255',
            'jumlahsoal' => 'required|integer|min:1',
            'persyaratan1' => 'nullable',
            'persyaratan2' => 'nullable',
            'persyaratan3' => 'nullable',
        ], [
            'type.required' => 'Tipe Kuis harus diisi.',
            'type.in' => 'Tipe Kuis yang dipilih tidak valid.',
            'jumlahsoal.required' => 'Jumlah Soal harus diisi.',
            'persyaratan1.exists' => 'Syarat pengerjaan Pertama tidak valid.',
            'persyaratan2.exists' => 'Syarat pengerjaan Kedua tidak valid.',
            'persyaratan3.exists' => 'Syarat pengerjaan Ketiga tidak valid.',
        ]);
        $user_id = Auth::id();
        $kuis = Kuis::create([
            'user_id' => $user_id,
            'type' => $request->type,
            'judulkuis' => $request->judulkuis,
            'jumlahsoal' => $request->jumlahsoal,
            'status' => 'belum mulai',

        ]);
        if ($request->persyaratan1) {
            Persyaratan::create([
                'kuis_id' => $kuis->id,
                'materi_id' => $request->persyaratan1,
            ]);
        }
        if ($request->persyaratan2) {
            Persyaratan::create([
                'kuis_id' => $kuis->id,
                'materi_id' => $request->persyaratan2,
            ]);
        }
        if ($request->persyaratan3) {
            Persyaratan::create([
                'kuis_id' => $kuis->id,
                'materi_id' => $request->persyaratan3,
            ]);
        }
        return back()->with('success', 'telah membuat kuis baru');
    }

    public function soalCreate($id)
    {
        $user = Auth::user();
        $kuis = Kuis::find($id);
        return view('kuis.soal-create', compact('kuis', 'user'));
    }

    public function soalStore(Request $request, $id)
    {
        $kuis = Kuis::find($id);
        $rules = [];
        $message = [];
        for ($i = 1; $i <= $kuis->jumlahsoal; $i++) {
            $rules["soal{$i}"] = 'required|string';
            $rules["jawabanbenar{$i}"] = 'required|string';
            $rules["jawabansatu{$i}"] = 'required|string';
            $rules["jawabandua{$i}"] = 'required|string';
            $rules["jawabantiga{$i}"] = 'required|string';
            $message["soal{$i}.required"] = "Soal {$i} harus diisi";
            $message["jawabanbenar{$i}.required"] = "Jawaban benar untuk soal {$i} harus diisi";
            $message["jawabansatu{$i}.required"] = "Opsi satu untuk soal {$i} harus diisi";
            $message["jawabandua{$i}.required"] = "Opsi dua untuk soal {$i} harus diisi";
            $message["jawabantiga{$i}.required"] = "Opsi tiga untuk soal {$i} harus diisi";
        }
        $validatedData = $request->validate($rules, $message);
        // dd($validatedData);

        // Proses pembuatan data soal dari $validatedData
        for ($i = 1; $i <= $kuis->jumlahsoal; $i++) {
            Soal::create([
                'kuis_id' => $kuis->id,
                'soal' => $validatedData["soal{$i}"],
                'jawabanbenar' => $validatedData["jawabanbenar{$i}"],
                'jawabansatu' => $validatedData["jawabansatu{$i}"],
                'jawabandua' => $validatedData["jawabandua{$i}"],
                'jawabantiga' => $validatedData["jawabantiga{$i}"]
            ]);
        }
        Kuis::where('id', $id)->update(['status' => 'siap mulai']);
        return redirect()->route('kuis-index')->with('success', 'Berhasil Membuat Soal');
    }

    public function mulaiKuis($id)
    {
        $user = Auth::user();
        $kuis = Kuis::find($id);
        $kuis->update(['status' => 'sedang mulai']);
        Pesan::create([
            'user_id' => $user->id,
            'pesan' => explode(' ', $user->name)[0] . ' Telah Memulai Kuis' . ' Berjudul : ' . $kuis->judulkuis,
            'info' => 'kuis-' . $kuis->id
        ]);
        return redirect()->route('send.whatsapp');
    }

    public function tutupKuis($id)
    {
        $kuis = Kuis::find($id);
        $kuis->update(['status' => 'telah selesai']);
        return back()->with('success', 'Kuis Sudah Di Tutup');
    }

    public function kerjakanKuis($id)
    {
        $kuis = Kuis::find($id);
        $soal = Soal::with('kuis')->where('kuis_id', $kuis->id)->get();
        $user = Auth::user();
        $jawaban = Jawaban::where([
            'user_id' => $user->id,
            'kuis_id' => $kuis->id,
        ])->first();
        if ($jawaban) {
            if ($jawaban->status == '0') {
                return back()->with('error', 'Anda Sudah Mensubmit Kuis Ini');
            }
            $detailjawaban = DetailJawaban::where('jawaban_id', $jawaban->id)->get();
            dd($detailjawaban);
            return view('kuis.kuis-kerjakan', compact('user', 'detailjawaban', 'soal', 'jawaban'));
        }
        $jawaban = Jawaban::create([
            "user_id" => $user->id,
            "kuis_id" => $kuis->id,
            "status" => '1',
        ]);
        foreach ($soal as $item) {
            DetailJawaban::create([
                'soal_id' => $item->id,
                'jawaban_id' => $jawaban->id,
            ]);
        }
        $detailjawaban = DetailJawaban::where('jawaban_id', $jawaban->id)->latest()->get();
        return view('kuis.kuis-kerjakan', compact('user', 'detailjawaban', 'soal', 'jawaban'));
    }
}
