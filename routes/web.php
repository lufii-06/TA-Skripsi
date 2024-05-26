<?php

use App\Http\Controllers\Siswa;
use App\Http\Controllers\Materi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SenseiController;
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

// route::get('/tesapi', function () {
//     $response = Http::withHeaders([
//         'Authorization' => 'Bearer ' . 'vB0vX+pTsrNTXRRgK1HqzIlrYBDvf8LKiOqzvzaWQBpO4GpyRJgJwdgnakJAOu9o-luthfi',
//     ])->get('https://api.kirimwa.id/v1/devices');
//     if ($response->json()['data'][0]['status'] == "disconnected") {
//         $response1 = Http::withHeaders([
//             'Authorization' => 'Bearer ' . 'vB0vX+pTsrNTXRRgK1HqzIlrYBDvf8LKiOqzvzaWQBpO4GpyRJgJwdgnakJAOu9o-luthfi',
//         ])->get('https://api.kirimwa.id/v1/qr?device_id=admin');
//         $qr = $response1->json()['image_url'];
//         return redirect()->away($qr);
//     }
// });


Route::get('/kirimwa', [WaController::class, 'sendWhatsAppMessage'])->name('send.whatsapp');

Route::get('/', function () {
    $user = Auth::user();
    if ($user) {
        return redirect()->route('home');
    }
    return view('welcome');
});

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
Route::get('/siswasearch', [SiswaController::class, 'search'])->name('siswa-search')->middleware('auth');
Route::get('/senseicreate', [SenseiController::class, 'create'])->name('sensei-create');
Route::put('/senseiupdate/{id}', [SenseiController::class, 'update'])->name('sensei-update');
Route::get('/senseiterima/{id}', [SenseiController::class, 'terima'])->name('sensei-terima');
Route::get('/senseitolak/{id}', [SenseiController::class, 'tolak'])->name('sensei-tolak');
Route::get('/senseiberhenti/{id}', [SenseiController::class, 'berhenti'])->name('sensei-berhenti');
Route::post('/senseistore', [SenseiController::class, 'store'])->name('sensei-store');
Route::get('/senseisearch', [SenseiController::class, 'search'])->name('sensei-search')->middleware('auth');
Route::post('/materistore', [MateriController::class, 'store'])->name('materi-store')->middleware('auth');
Route::get('/materidetail/{id}', [MateriController::class, 'detail'])->name('materi-detail')->middleware('auth');
Route::get('/daftarsiswa', [SiswaController::class, 'index'])->name('siswa-index')->middleware('auth');
Route::put('/updatesiswa/{id}', [SiswaController::class, 'update'])->name('siswa-update')->middleware('auth');
Route::get('/lulussiswa/{id}', [SiswaController::class, 'lulus'])->name('siswa-lulus')->middleware('auth');
Route::get('/hapussiswa/{id}', [SiswaController::class, 'hapus'])->name('siswa-hapus')->middleware('auth');
Route::get('/daftarsensei', [SenseiController::class, 'index'])->name('sensei-index')->middleware('auth');
// Route::get('/kuisdetail/{id}', [HomeController::class, 'detail'])->name('pesan-detail')->middleware('auth');
