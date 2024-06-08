<?php

use App\Http\Controllers\NilaiController;
use App\Http\Controllers\Siswa;
use App\Http\Controllers\Materi;
use App\Http\Controllers\Absensi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\kuisController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SenseiController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    $user = Auth::user();
    if ($user) {
        return redirect()->route('home');
    }
    return view('welcome');
});
Route::get('/kirimwa', [WaController::class, 'sendWhatsAppMessage'])->name('send.whatsapp');

Auth::routes();
Route::post('/storeprofile', [HomeController::class, 'store'])->name('profile.store');
Route::get('/detailprofile', [HomeController::class, 'detailprofile'])->name('profile-detail');
Route::get('/editprofile/{id}', [HomeController::class, 'editprofile'])->name('profile-edit');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('pesan-detail')->middleware('auth');
Route::post('/reset', [RegisterController::class, 'reset'])->name('password.reset');
Route::get('/editpassword/{id}', [RegisterController::class, 'edit'])->name('password.edit');
Route::post('/updatepassword', [RegisterController::class, 'update'])->name('password.update');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/materi', [MateriController::class, 'index'])->name('materi')->middleware('auth');
Route::get('/matericreate', [MateriController::class, 'create'])->name('materi-create')->middleware('auth');
Route::get('/materisearch', [MateriController::class, 'search'])->name('materi-search')->middleware('auth');
Route::get('/materidestroy/{id}', [MateriController::class, 'destroy'])->name('materi-destroy')->middleware('auth');
Route::get('/siswasearch', [SiswaController::class, 'search'])->name('siswa-search')->middleware('auth');
Route::get('/kuissearch', [kuisController::class, 'search'])->name('kuis-search')->middleware('auth');
Route::get('/senseicreate', [SenseiController::class, 'create'])->name('sensei-create');
Route::put('/senseiupdate/{id}', [SenseiController::class, 'update'])->name('sensei-update')->middleware('auth');
Route::get('/senseiterima/{id}', [SenseiController::class, 'terima'])->name('sensei-terima')->middleware('auth');
Route::get('/senseitolak/{id}', [SenseiController::class, 'tolak'])->name('sensei-tolak')->middleware('auth');
Route::get('/senseiberhenti/{id}', [SenseiController::class, 'berhenti'])->name('sensei-berhenti')->middleware('auth');
Route::post('/senseistore', [SenseiController::class, 'store'])->name('sensei-store');
Route::get('/senseisearch', [SenseiController::class, 'search'])->name('sensei-search')->middleware('auth');
Route::get('/kelassearch', [SiswaController::class, 'kelassearch'])->name('kelas-search')->middleware('auth');
Route::post('/kelassearch/{id}', [SiswaController::class, 'kelasgabung'])->name('kelas-gabung')->middleware('auth');
Route::post('/materistore', [MateriController::class, 'store'])->name('materi-store')->middleware('auth');
Route::get('/materidetail/{id}', [MateriController::class, 'detail'])->name('materi-detail')->middleware('auth');
Route::get('/daftarsiswa', [SiswaController::class, 'index'])->name('siswa-index')->middleware('auth');
Route::get('/daftarkelas', [SiswaController::class, 'kelasindex'])->name('kelas-index')->middleware('auth');
Route::get('/detailkelas/{id}', [SiswaController::class, 'kelasdetail'])->name('kelas-detail')->middleware('auth');
Route::put('/updatesiswa/{id}', [SiswaController::class, 'update'])->name('siswa-update')->middleware('auth');
Route::get('/lulussiswa/{id}', [SiswaController::class, 'lulus'])->name('siswa-lulus')->middleware('auth');
Route::get('/hapussiswa/{id}', [SiswaController::class, 'hapus'])->name('siswa-hapus')->middleware('auth');
Route::get('/daftarsensei', [SenseiController::class, 'index'])->name('sensei-index')->middleware('auth');
Route::get('/absensi/{id}', [AbsensiController::class, 'absen'])->name('absen-create')->middleware('auth');
Route::get('/kuis', [kuisController::class, 'index'])->name('kuis-index')->middleware('auth');
Route::POST('/kuiscreate', [kuisController::class, 'create'])->name('kuis-create')->middleware('auth');
Route::get('/soalcreate/{id}', [kuisController::class, 'soalCreate'])->name('soal-create')->middleware('auth');
Route::post('/soalcreate/{id}', [kuisController::class, 'soalStore'])->name('soal-store')->middleware('auth');
Route::post('/soalchokaicreate/{id}', [kuisController::class, 'soalchokaiStore'])->name('soalchokai-store')->middleware('auth');
Route::get('/kuismulai/{id}', [kuisController::class, 'mulaiKuis'])->name('kuis-mulai')->middleware('auth');
Route::get('/kuistutup/{id}', [kuisController::class, 'tutupKuis'])->name('kuis-tutup')->middleware('auth');
Route::get('/kuiskerjakan/{id}', [kuisController::class, 'kerjakanKuis'])->name('kuis-kerjakan')->middleware('auth');

Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai')->middleware('auth');
Route::get('/nilaidetail', [NilaiController::class, 'nilaisaya'])->name('nilai-detail')->middleware('auth');
Route::get('/nilaisearch', [NilaiController::class, 'nilaisearch'])->name('nilai-search')->middleware('auth');
Route::get('/kuisdetail/{id}', [NilaiController::class, 'detailkuis'])->name('kuis-detail')->middleware('auth');
// Route::get('/kuisdetail/{id}', [HomeController::class, 'detail'])->name('pesan-detail')->middleware('auth');

Route::post('/cetaksensei', [SenseiController::class, 'cetaksensei'])->name('sensei-cetak')->middleware('auth');
Route::post('/cetaksiswa', [SiswaController::class, 'cetaksiswa'])->name('siswa-cetak')->middleware('auth');
Route::get('/cetakkelas', [SiswaController::class, 'cetakkelas'])->name('kelas.cetak')->middleware('auth');
Route::post('/cetakmateri', [MateriController::class, 'cetakmateri'])->name('materi-cetak')->middleware('auth');
Route::post('/cetakmateriperkelas', [MateriController::class, 'cetakmateriperkelas'])->name('materi.cetakperkelas')->middleware('auth');

