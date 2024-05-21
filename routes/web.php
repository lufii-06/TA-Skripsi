<?php

use App\Http\Controllers\Siswa;
use App\Http\Controllers\Materi;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    $user = Auth::user();
    if ($user) {
        return redirect()->route('home');
    }
    return view('welcome');
});

Auth::routes();
Route::post('/storeprofile', [HomeController::class, 'store'])->name('profile.store');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('pesan-detail')->middleware('auth');
Route::post('/reset', [RegisterController::class, 'reset'])->name('password.reset');
Route::get('/editpassword/{id}', [RegisterController::class, 'edit'])->name('password.edit');
Route::post('/updatepassword', [RegisterController::class, 'update'])->name('password.update');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/materi', [MateriController::class, 'index'])->name('materi')->middleware('auth');
Route::get('/matericreate', [MateriController::class, 'create'])->name('materi-create')->middleware('auth');
Route::get('/materisearch', [MateriController::class, 'search'])->name('materi-search')->middleware('auth');
Route::post('/materistore', [MateriController::class, 'store'])->name('materi-store')->middleware('auth');
Route::get('/materidetail/{id}', [MateriController::class, 'detail'])->name('materi-detail')->middleware('auth');
Route::get('/daftarsiswa', [SiswaController::class, 'index'])->name('siswa-index')->middleware('auth');
Route::get('/daftarsensei', [SenseiController::class, 'index'])->name('sensei-index')->middleware('auth');
// Route::get('/kuisdetail/{id}', [HomeController::class, 'detail'])->name('pesan-detail')->middleware('auth');

