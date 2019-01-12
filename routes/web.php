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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Admin\AdminController@index')->name('admin.home');
//surat-masuk
Route::get('/suratmasuk', 'Admin\SuratMasukController@index')->name('admin.surat-masuk');
Route::post('/suratmasuk/upload', 'Admin\SuratMasukController@store')->name('admin.surat-masuk.upload');


//surat-keluar
Route::get('/suratkeluar', 'Admin\SuratKeluarController@index')->name('admin.surat-keluar');
Route::post('/suratkeluar/upload', 'Admin\SuratKeluarController@store')->name('admin.surat-keluar.upload');

//histori-surat
Route::get('/histori-surat', 'Admin\HistoriController@index')->name('admin.histori');

//pengaturan-akun
Route::get('/pengaturan-akun', 'Admin\PengaturanController@index')->name('admin.pengaturan-akun');
Route::get('/pengaturan-akun/add-akun', 'Admin\PengaturanController@addakun')->name('admin.add-akun');
Route::post('/pengaturan-akun/add-akun/create', 'Admin\PengaturanController@create_akun')->name('admin.pengaturan.create');
Route::get('/pengaturan-akun/edit-akun/{id}', 'Admin\PengaturanController@edit')->name('admin.edit-akun');
Route::patch('/pengaturan-akun/update/{id}', 'Admin\PengaturanController@update')->name('admin.pengaturan.update');
Route::delete('/pengaturan-akun/delete/{id}', 'Admin\PengaturanController@destroy')->name('admin.pengaturan.delete');

//notifikasi
Route::get('/notif', 'Admin\FirebaseController@index');
