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

//detail-disposisi-masuk
Route::get('/detail-disposisi-masuk-kabid/{id}','Admin\AdminController@detaildm')->name('admin.detaildm.kabid');
Route::get('/detail-disposisi-masuk-subid/{id}','Admin\AdminController@detaildmsubid')->name('admin.detaildm.subid');

//detail-disposisi-keluar
Route::get('/detail-disposisi-keluar-kabid/{id}','Admin\AdminController@detaildk')->name('admin.detaildk.kabid');
Route::get('/detail-disposisi-keluar-subid/{id}','Admin\AdminController@detaildksubid')->name('admin.detaildk.subid');

//preview-pdf
Route::get('/suratmasuk/view/{id}', ['as'=>'view_pdf_masuk','uses'=>'Admin\AdminController@view_pdf']);
Route::get('/suratmasuk/view_pdf/{id}', ['as'=>'view_pdf','uses'=>'Admin\AdminController@view']);
Route::get('/suratmasuk/view_tes/{id}', ['as'=>'view_pdf_tes','uses'=>'Admin\AdminController@showTenderDocs']);

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
Route::get('/json-subid', 'Admin\PengaturanController@subid');
Route::get('/json-kabid', 'Admin\PengaturanController@kabid');

//Jabatan
Route::get('/konfigurasi-jabatan', 'Admin\JabatanController@index')->name('admin.jabatan');
Route::get('/konfigurasi-jabatan/add', 'Admin\JabatanController@create')->name('admin.jabatan.add');
Route::post('/konfigurasi-jabatan/create', 'Admin\JabatanController@store')->name('admin.jabatan.create');
Route::get('/konfigurasi-jabatan/edit/{id}', 'Admin\JabatanController@edit')->name('admin.jabatan.edit');
Route::patch('/konfigurasi-jabatan/update/{id}', 'Admin\JabatanController@update')->name('admin.jabatan.update');
Route::delete('/konfigurasi-jabatan/delete/{id}', 'Admin\JabatanController@destroy')->name('admin.jabatan.delete');


//Kabid
Route::get('/konfigurasi-kabid', 'Admin\KabidController@index')->name('admin.kabid');
Route::get('/konfigurasi-kabid/add', 'Admin\KabidController@create')->name('admin.kabid.add');
Route::post('/konfigurasi-kabid/create', 'Admin\KabidController@store')->name('admin.kabid.create');
Route::get('/konfigurasi-kabid/edit/{id}', 'Admin\KabidController@edit')->name('admin.kabid.edit');
Route::patch('/konfigurasi-kabid/update/{id}', 'Admin\KabidController@update')->name('admin.kabid.update');
Route::delete('/konfigurasi-kabid/delete/{id}', 'Admin\KabidController@destroy')->name('admin.kabid.delete');

//Subid
Route::get('/konfigurasi-subid', 'Admin\SubidController@index')->name('admin.subid');
Route::get('/konfigurasi-subid/add', 'Admin\SubidController@create')->name('admin.subid.add');
Route::post('/konfigurasi-subid/create', 'Admin\SubidController@store')->name('admin.subid.create');
Route::get('/konfigurasi-subid/edit/{id}', 'Admin\SubidController@edit')->name('admin.subid.edit');
Route::patch('/konfigurasi-subid/update/{id}', 'Admin\SubidController@update')->name('admin.subid.update');
Route::delete('/konfigurasi-subid/delete/{id}', 'Admin\SubidController@destroy')->name('admin.subid.delete');


//post-notif
Route::resource('post', 'PostController');

Route::get('/suratmasuk/printPDF', 'Admin\AdminController@printPDF');
