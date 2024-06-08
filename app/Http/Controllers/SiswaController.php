<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\DetailUser;
use App\Models\AnggotaKelas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $siswa = User::with('DetailUser')->where('status', '1')
            ->whereHas('detailuser', function ($query) {
                $query->whereNotNull('user_nomor');
            })->paginate(5);
        return view('siswa.siswa-index', compact('user', 'siswa'));
    }

    public function kelasdetail($id)
    {
        $user = Auth::user();
        $kelas = Kelas::find($id);
        $anggotakelas = AnggotaKelas::with('user.DetailUser')->where('kelas_id', $kelas->id)->get();
        return view('kelas.kelas-detail', compact('user', 'kelas', 'anggotakelas'));
    }
    public function search()
    {
        $user = Auth::user();
        $siswa = User::latest()->filter(request(['search']))->where('status', '1')
            ->whereHas('detailuser', function ($query) {
                $query->whereNotNull('user_nomor');
            })->paginate(5);
        return view('siswa.siswa-index', compact('user', 'siswa'));
    }

    public function lulus($id)
    {
        $siswa = User::find($id);
        $siswa->update(['status' => 'lulus']);
        return redirect()->back()->with('success', 'Telah meluluskan siswa');
    }
    public function hapus($id)
    {
        $siswa = User::find($id);
        $siswa->hapus();
        return redirect()->back()->with('success', 'Telah menghapus siswa');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'alamat' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'usia' => ['required', 'integer'],
            'pendidikanterakhir' => ['required', Rule::in(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'])],
            'jurusan' => ['required', 'string'],
            'tinggibadan' => ['required', 'integer'],
            'beratbadan' => ['required', 'integer'],
            'nohp' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        DetailUser::where('user_id', $id)->update([
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => $request->usia,
            'pendidikanterakhir' => $request->pendidikanterakhir,
            'jurusan' => $request->jurusan,
            'tinggibadan' => $request->tinggibadan,
            'beratbadan' => $request->beratbadan,
            'nohp' => $request->nohp,
        ]);
        return redirect()->route('profile-detail')->with('success', 'Berhasil mengupdate profil');
    }

    public function kelasindex()
    {
        $user = Auth::user();
        $kelas_id = Kelas::where('user_id', $user->id)->first();
        $kelas = Kelas::with('user', 'anggotakelas')->paginate(5);
        return view('kelas.kelas-index', compact('kelas', 'user', 'kelas_id'));
    }

    public function kelassearch()
    {
        $user = Auth::user();
        $kelas = Kelas::with('user', 'anggotakelas')->latest()->filter(request(['search']))->paginate(5);
        return view('kelas.kelas-index', compact('user', 'kelas'));
    }

    public function kelasgabung(Request $request, $id)
    {
        $user = Auth::user();
        $kelas = Kelas::find($id);
        $anggotakelas = AnggotaKelas::where('user_id', $user->id)->first();
        if ($anggotakelas) {
            return back()->with('error', 'Anda sudah Memasuki Kelas');
        }
        if ($kelas->token == $request->token) {
            AnggotaKelas::create([
                'user_id' => $user->id,
                'kelas_id' => $kelas->id,
            ]);
            //menghitung jumlah siswa pada table anggota kelas
            $jmlkelas = $kelas->count();
            $jmlanggota = AnggotaKelas::whereNot('user_id', '1')->count();
            $jmlsiswa = $jmlanggota - $jmlkelas;
            $no_siswa = str_pad($jmlsiswa, 7, '0', STR_PAD_LEFT);
            $s = 'S-';
            DetailUser::where('user_id', $user->id)->update(['user_nomor' => $s . $no_siswa]);
            return back()->with('success', 'berhasil gabung ke kelas');
        } else {
            return back()->with('error', 'Token tidak ditemukan');
        }
    }

    public function cetaksiswa(Request $request)
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
        $siswa = User::with('detailuser')->where('status', '1')
            ->whereHas('detailuser', function ($query) {
                $query->whereNotNull('user_nomor');
            })->whereBetween('updated_at', [$tanggal1, $tanggal2])->get();
        if ($siswa->isEmpty()) {
            return back()->with('error', 'Siswa Tidak Ada');
        } else {
            $pdf = Pdf::loadView('siswa.cetak', compact('siswa', 'periode', 'tahun'));
            return $pdf->download('Datasiswa.pdf');
        }
    }

    public function cetakkelas()
    {
        $kelas = Kelas::with('materi','user','anggotakelas')->get();
        if ($kelas->isEmpty()) {
            return back()->with('error', 'materi Tidak Ada');
        } else {
            return view('kelas.cetak', compact('kelas'));
        }
    }
}
