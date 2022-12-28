<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SipenmaruController;

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
    return view('welcome');
});
Route::get('/login', [SipenmaruController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [SipenmaruController::class, 'proslogin']);
Route::get('/logout', [SipenmaruController::class, 'logout']);

Route::get('/signup', [SipenmaruController::class, 'register'])->name('register')->middleware('guest');
Route::post('/signup', [SipenmaruController::class, 'insertRegis']);

//Untuk Keduanya
Route::get('/index', [SipenmaruController::class, 'beranda']);
Route::get('/profile', [SipenmaruController::class, 'dataprofil']);
Route::post('/profile', [SipenmaruController::class, 'ubahprofil']);

//Untuk User
Route::get('/pendaftaran', [SipenmaruController::class, 'formdaftar']);
Route::post('/save-registration', [SipenmaruController::class, 'simpanpendaftaran']);

//Untuk Admin
Route::get('/data-pendaftaran', [SipenmaruController::class, 'listpendaftaran']);
Route::get('/editpendaftaran/{id}', [SipenmaruController::class, 'editlistpendaftaran']);
Route::post('/editpendaftaran/{id}', [SipenmaruController::class, 'updatelistpendaftaran']);
Route::get('/delete/{id}', [SipenmaruController::class, 'deletelistpendaftaran'])->name('delete');
Route::get('/download', [SipenmaruController::class, 'generatepdf']);


