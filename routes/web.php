<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
    if($user){
        return redirect()->route('home');
    }
    return view('welcome');
});

Auth::routes();
Route::post('/storeprofile', [HomeController::class, 'store'])->name('profile.store');
Route::post('/reset', [RegisterController::class, 'reset'])->name('password.reset');
Route::get('/editpassword/{id}', [RegisterController::class, 'edit'])->name('password.edit');
Route::post('/updatepassword', [RegisterController::class, 'update'])->name('password.update');
Route::get('/home', [HomeController::class, 'home'])->name('home');
