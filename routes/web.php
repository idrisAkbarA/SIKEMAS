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

//* DASHBOARD ADMIN
// Route::get('/admin', function () {
//     return view('dashboardAdmin');
// });
Route::get('/admin', 'KegiatanController@admin');
Route::get('/search', 'KegiatanController@searchAsAdmin');

//* FORM KEGIATAN
Route::get('/formkegiatan', function () {
    return view('formKegiatan');
});

//* DASHBOARD PENGGUNA
Route::get('/dashboard', 'KegiatanController@index');
Route::post('/formkegiatan', 'KegiatanController@store');
Route::get('/detail/{id}', 'KegiatanController@detail');
Route::get('/cari', 'KegiatanController@searchAsUser');

//* PESERTA
Route::get('/detailpeserta', function () {
    return view('detailPeserta');
});
Route::get('/peserta', 'PesertaController@index');

//* AKUN PENGGUNA
Route::get('/pengguna', 'KelurahanController@index');
Route::post('/pengguna', 'KelurahanController@edit');
Route::post('/pengguna/tambah', 'KelurahanController@tambah');
Route::delete('/pengguna/{id}', 'KelurahanController@hapus');
Route::post('/pengguna/{id}', 'KelurahanController@reset');

//* UBAH KATA SANDI
Route::get('/ubahsandi', function () {
    return view('ubahSandi');
});
Route::post('/cekSandi', 'KelurahanController@cekSandi');
Route::post('/ubahSandi', 'KelurahanController@ubahSandi');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function () {
    return view('test');
});