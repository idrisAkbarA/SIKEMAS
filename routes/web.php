<?php

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
    return view('login');
});
Route::get('/masuk', function () {
    return view('beranda');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/kegiatan', function () {
    return view('kegiatan');
});
Route::get('/formkegiatan', function () {
    return view('formKegiatan');
});
Route::get('/detail', function () {
    return view('detail');
});
Route::get('/ubahsandi', function () {
    return view('ubahSandi');
});
Route::get('/akunpengguna', function () {
    return view('akunPengguna');
});
Route::get('/peserta', function () {
    return view('peserta');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
