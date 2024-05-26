<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DetailUser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $siswa = User::with('DetailUser')->where('status', '1')->paginate(5);
        return view('siswa.siswa-index', compact('user', 'siswa'));

    }
    public function search()
    {
        $user = Auth::user();
        $siswa = User::latest()->filter(request(['search']))->where('status', '1')->get();
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
}
