<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware' => ['auth','checkRole:staf']],function(){
//Presensi
Route::get('/presensi', 'PresensiController@index')->name('presensi');
Route::post('/lokasi', 'PresensiController@cek_lokasi');
Route::post('/absen', 'PresensiController@datang');
//ijin
Route::get('/ijin', 'PerijinanController@index')->name('ijin');
Route::get('/tanggal_ijin/{id}', 'PerijinanController@tanggal_ijin');
Route::post('/ijin/upload', 'PerijinanController@upload_ijin');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','checkRole:admin']],function(){
//presensi
Route::get('/presensi/laporan', 'PresensiController@laporan');
Route::get('/presensi/laporan/cetak', 'PresensiController@cetak_presensi');
Route::get('/presensi/laporan/cetak/{tglawal}/{tglakhir}', 'PresensiController@cetak_presensi_pertanggal');

//perijinan
Route::get('/perijinan/laporan', 'PerijinanController@laporan');
Route::get('/perijinan/laporan/cetak-ijin', 'PerijinanController@cetak_perijinan');
Route::get('/perijinan/laporan/cetak/{tglawal}/{tglakhir}','PerijinanController@cetak_perijinan_pertanggal');
Route::patch('/ijin/update/{id}', 'PerijinanController@updateijin');
// Route::get('perijinan/cetak-ijin', 'PerijinanController@cetakIjin')->name('cetak-ijin');
    
//staff
Route::get('/staff/laporan', 'StafController@index');
Route::get('/staff/laporan/cetak', 'StafController@cetak_staff');
Route::get('/staff/laporan/cetak/{tglawal}/{tglakhir}','StafController@cetak_staff_pertanggal');
Route::post('/staff/update', 'StafController@proses_upload');
Route::delete('/staff/laporan/{id}','StafController@destroy');
Route::get('/staff/edit/{id}','StafController@edit');
});

//Akun
Route::get('/profil', 'AkunController@index')->name('profil');
Route::post('/profile/update', 'AkunController@updateprofile');

//Riwayat
Route::get('/riwayat/laporan', 'RiwayatController@laporan');
Route::get('/riwayat/laporan/cetak', 'RiwayatController@cetak_riwayat');
Route::get('/riwayat/laporan/cetak/{tglawal}/{tglakhir}', 'RiwayatController@cetak_riwayat_pertanggal');

    
    