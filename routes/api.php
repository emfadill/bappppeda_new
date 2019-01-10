<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1' , 'middleware' => 'cors'], function() {
	Route::post('/user/add', [
		'uses' => 'Admin\PengaturanController@create_akun'
	]);

		Route::post('/user/login', [
		'uses' => 'Api\AuthController@login'
	]);

    Route::group(['middleware' => 'jwt.auth'], function() {

        //surat-masuk
        Route::get('/surat-masuk','Api\SuratMasukController@viewSuratMasuk');
        Route::get('/surat-masuk/{id}','Api\SuratMasukController@viewSuratMasukDetail');
        Route::post('/surat-masuk/{id}','Api\SuratMasukController@updateSuratMasuk');
        Route::get('/spesifik/surat-masuk','Api\SuratMasukController@viewSuratMasukSpesifik');

        //surat-keluar
        Route::get('/surat-keluar','Api\SuratKeluarController@viewSuratKeluar');
        Route::get('/surat-keluar/{id}','Api\SuratKeluarController@viewSuratKeluarDetail');
        Route::post('/surat-keluar/{id}','Api\SuratKeluarController@updateSuratKeluar');
        Route::get('/spesifik/surat-keluar','Api\SuratKeluarController@viewSuratKeluarSpesifik');

        //ambil data user
        Route::get('/data-user','Api\SuratMasukController@data_user');

        //search kepala-bappppeda
        Route::get('/surat-masuk-cari','Api\SuratMasukController@search_dokumen');
        Route::get('/surat-keluar-cari','Api\SuratKeluarController@search_dokumen');

        //search per user
        Route::get('/spesifik/surat-masuk/cari','Api\SuratMasukController@search_dokumen_spesifik');
        Route::get('/spesifik/surat-keluar/cari','Api\SuratKeluarController@search_dokumen_spesifik');
    });

});

