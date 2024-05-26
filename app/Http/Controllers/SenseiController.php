<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SenseiController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $sensei = User::with('DetailUser')->whereIn('status', [2, 3])->orderBy('status', 'asc')->paginate(5);
        return view('sensei.sensei-index', compact('user', 'sensei'));
    }

    public function search()
    {
        $user = Auth::user();
        $sensei = User::latest()->filter(request(['search']))->whereIn('status', [2, 3])->orderBy('status', 'asc')->paginate(5);
        return view('sensei.sensei-index', compact('user', 'sensei'));
    }

    public function create()
    {
        return view('sensei.sensei-create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'alamat' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'usia' => ['required', 'integer'],
            'nohp' => ['required', 'string'],
            'levelkemampuan' => ['required', Rule::in(['N4', 'N3', 'N2', 'N1'])],
        ], [
            'password.confirmed' => 'Password dan konfirmasi password tidak cocok.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'status' => '2'
            //status 0 : siswa belum aktif
            //status 1 : siswa sudah aktif
            //status 2 : guru belum aktif
            //status 3 : guru belum aktif
            //status 4 : admin
        ]);
        $detailuser = DetailUser::create([
            'user_id' => $user->id,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => $request->usia,
            'pendidikanterakhir' => $request->pendidikanterakhir,
            'nohp' => $request->nohp,
            'levelkemampuan' => $request->levelkemampuan
        ]);
        return redirect()->route('home')->with('Success', 'Tunggu informasi penerimaan dari pihak lpk ');
    }
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'alamat' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'usia' => ['required', 'integer'],
            'nohp' => ['required', 'string'],
            'levelkemampuan' => ['required', Rule::in(['N4', 'N3', 'N2', 'N1'])],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        DetailUser::where('user_id',$id)->update([
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => $request->usia,
            'nohp' => $request->nohp,
            'levelkemampuan' => $request->levelkemampuan,
        ]);
        return redirect()->route('profile-detail')->with('success','Berhasil mengupdate profil');
    }
    public function terima($id)
    {
        $sensei = User::find($id);
        $sensei->update(['status' => '3']);
        return redirect()->back()->with('success', 'Telah Menerima sensei baru');
    }
    public function tolak($id)
    {
        $sensei = User::find($id);
        $sensei->delete();
        return redirect()->back()->with('success', 'Menolak sensei');
    }

    public function berhenti($id)
    {
        $sensei = User::find($id);
        $sensei->delete();
        return redirect()->back()->with('success', 'Sensei telah berhenti mengajari di hoshi hikari');
    }

}
