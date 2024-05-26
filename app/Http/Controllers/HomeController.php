<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DetailUser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $user = Auth::user();
        //status 0 : siswa belum aktif
        //status 1 : siswa sudah aktif
        //status 2 : guru belum aktif
        //status 3 : guru sudah aktif
        $today = date('d-n-Y');
        // Jika tanggal saat ini kurang dari 1 April, itu berarti kita berada di semester genap
        $semesterType = ($today < '01-04-' . date('Y')) ? 'Genap' : 'Ganjil';
        $semester = $semesterType . date(' Y');
        if ($user->status == '0') {
            return view("profile.create");
        } elseif ($user->status == '2') {
            return view('sensei.informasi', compact('user'));
        } else {
            $jmluser = User::where('status', '1')->count();
            $jmlsensei = User::where('status', '3')->count();
            return view('layouts.home', compact("user", "jmluser", "jmlsensei", "semester"));
        }
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'alamat' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'usia' => ['required', 'integer'],
            'pendidikanterakhir' => ['required', Rule::in(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'])],
            'jurusan' => ['required', 'string'],
            'tinggibadan' => ['required', 'integer'],
            'beratbadan' => ['required', 'integer'],
            'nohp' => ['required', 'string'],
            'budayaJepang' => ['required', Rule::in(['ya', 'tidak'])],
            'pergiKeluarNegri' => ['required', Rule::in(['ya', 'tidak'])],
            'tindikTato' => ['required', Rule::in(['ya', 'tidak'])],
            'bekerjaTekanan' => ['required', Rule::in(['ya', 'tidak'])],
            'orangTuaMasihAda' => ['required', Rule::in(['ya', 'tidak'])],
            'orangTuaTahu' => ['required', Rule::in(['ya', 'tidak'])],
            'kemauanSendiri' => ['required', Rule::in(['ya', 'tidak'])],
            'cacatTubuh' => ['required', Rule::in(['ya', 'tidak'])],
            'rabunButaWarna' => ['required', Rule::in(['ya', 'tidak'])],
            'gigiPalsu' => ['required', Rule::in(['ya', 'tidak'])],
            'soal1' => ['required', 'string'],
            'soal2' => ['required', 'string'],
        ], [
            '*.required' => 'Wajib diisi',
        ]);

        // Dapatkan ID pengguna yang saat ini masuk
        $user = Auth::user();

        $newData = [
            'user_id' => $user->id,
            'alamat' => $validatedData['alamat'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'usia' => $validatedData['usia'],
            'pendidikanterakhir' => $validatedData['pendidikanterakhir'],
            'jurusan' => $validatedData['jurusan'],
            'tinggibadan' => $validatedData['tinggibadan'],
            'beratbadan' => $validatedData['beratbadan'],
            'nohp' => $validatedData['nohp'],
            'budayaJepang' => $validatedData['budayaJepang'],
            'pergiKeluarNegri' => $validatedData['pergiKeluarNegri'],
            'tindikTato' => $validatedData['tindikTato'],
            'bekerjaTekanan' => $validatedData['bekerjaTekanan'],
            'orangTuaMasihAda' => $validatedData['orangTuaMasihAda'],
            'orangTuaTahu' => $validatedData['orangTuaTahu'],
            'kemauanSendiri' => $validatedData['kemauanSendiri'],
            'cacatTubuh' => $validatedData['cacatTubuh'],
            'rabunButaWarna' => $validatedData['rabunButaWarna'],
            'gigiPalsu' => $validatedData['gigiPalsu'],
            'soal1' => $validatedData['soal1'],
            'soal2' => $validatedData['soal2']
        ];

        $DetailUser = new DetailUser($newData);
        $DetailUser->save();

        User::where('id', $user->id)->update(['status' => '1']);

        return redirect()->route('home');
    }

    public function detail($id)
    {
        $pisahkan = explode("-", $id);
        $kode = $pisahkan[0];
        $nokode = $pisahkan[1];
        if ($kode == 'materi') {
            return redirect()->route('materi-detail', $nokode);
        } else {
            // return redirect()->route();
            dd($id);
        }
    }

    public function detailprofile()
    {
        $iduser = Auth::id();
        $user = User::with('detailuser')->find($iduser);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . 'vB0vX+pTsrNTXRRgK1HqzIlrYBDvf8LKiOqzvzaWQBpO4GpyRJgJwdgnakJAOu9o-luthfi',
        ])->get('https://api.kirimwa.id/v1/devices');
        if ($response->json()['data'][0]['status'] == "disconnected") {
            $response1 = Http::withHeaders([
                'Authorization' => 'Bearer ' . 'vB0vX+pTsrNTXRRgK1HqzIlrYBDvf8LKiOqzvzaWQBpO4GpyRJgJwdgnakJAOu9o-luthfi',
            ])->get('https://api.kirimwa.id/v1/qr?device_id=admin');
            $qr = $response1->json()['image_url'];
            return view('profile.detail', compact('user', 'qr'));
        }
        
        return view('profile.detail', compact('user'));

    }

    public function editprofile($id)
    {
        $user = User::with('detailuser')->find($id);
        return view('profile.edit', compact('user'));
    }
}
