<?php

namespace App\Http\Controllers\Auth;

use auth;
use App\Models\User;
use App\Models\DetailUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => '0'
            //status 0 : siswa belum aktif
            //status 1 : siswa sudah aktif
            //status 2 : guru
            //status 3 : admin
        ]);
    }

    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = User::where('email', $request->email)->with('DetailUser')->first();
        if ($user && $user->status == '0') {
            return redirect()->route('password.edit', ['id' => Crypt::encrypt($user->id)]);
        } else {
            if ($user && $user->detailuser->nohp == $request->nohp) {
                return redirect()->route('password.edit', ['id' => Crypt::encrypt($user->id)]);
            } else {
                return redirect()->back()->withInput()->with(['message' => 'E-Mail atau Nohp tidak ditemukan']);
            }
        }
    }

    public function edit($id)
    {
        $userId = Crypt::decrypt($id);
        return view('auth.passwords.reset')->with('userId', $userId);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::findOrFail($request->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login')->with('message', 'Berhasil Update Password');
    }
}
