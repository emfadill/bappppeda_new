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
        //data user jabatan kabid
        Route::get('/data-kabid','Api\KonfigurasiController@kabid');

        //data user jabatan subid
        Route::get('/data-subid','Api\KonfigurasiController@subid');

        //surat-masuk
        Route::get('/surat-masuk','Api\SuratMasukController@viewSuratMasuk');
        Route::get('/surat-masuk/{id}','Api\SuratMasukController@viewSuratMasukDetail');
        Route::post('/surat-masuk/{id}','Api\SuratMasukController@updateSuratMasuk');
        // Route::get('/spesifik/surat-masuk','Api\SuratMasukController@viewSuratMasukSpesifik');

        //surat-keluar
        Route::get('/surat-keluar','Api\SuratKeluarController@viewSuratKeluar');
        Route::get('/surat-keluar/{id}','Api\SuratKeluarController@viewSuratKeluarDetail');
        Route::post('/surat-keluar/{id}','Api\SuratKeluarController@updateSuratKeluar');
        Route::post('/surat-keluar-langsung/{id}','Api\SuratKeluarController@updateSuratKeluar_langsung');
        Route::get('/spesifik/surat-keluar','Api\SuratKeluarController@viewSuratKeluarSpesifik');


        //search kepala-bappppeda
        Route::get('/surat-masuk-cari','Api\SuratMasukController@search_dokumen');
        Route::get('/surat-keluar-cari','Api\SuratKeluarController@search_dokumen');

        //search per user
        Route::get('/spesifik/surat-masuk/cari','Api\SuratMasukController@search_dokumen_spesifik');
        Route::get('/spesifik/surat-keluar/cari','Api\SuratKeluarController@search_dokumen_spesifik');

        //disposisi-masuk-detail-dari-surat-masuk        
        Route::get('/surat-masuk-disposisi-kabid/{id}','Api\DisposisiMasukKabidController@viewDisposisiKabid');
        //disposisi-masuk-detail-kabid       
        Route::get('/surat-masuk/disposisi/kabid/{id}','Api\DisposisiMasukKabidController@viewDisposisiKabidDetail');
        //disposisi-masuk-detail-subid  
        Route::get('/surat-masuk/disposisi/subid/{id}','Api\DisposisiMasukSubidController@viewDisposisiSubidDetail');

        //disposisimasuk per kabid
        Route::get('/surat-masuk/disposisi/kabid/','Api\DisposisiMasukKabidController@viewDisposisiKabidSpesifik');
        Route::post('/surat-masuk/disposisi/kabid/{id}','Api\DisposisiMasukKabidController@teruskanDisposisiKabid');

        //disposisimasuk per subid
        Route::get('/surat-masuk/disposisi/subid/','Api\DisposisiMasukSubidController@viewDisposisiSubidSpesifik');

         //disposisi-keluar-detail-dari-surat-keluar        
        Route::get('/surat-keluar-disposisi-kabid/{id}','Api\DisposisiKeluarKabidController@viewDisposisiKabid');
        //disposisi-keluar-detail-kabid       
        Route::get('/surat-keluar/disposisi/kabid/{id}','Api\DisposisiKeluarKabidController@viewDisposisiKabidDetail');
        //disposisi-keluar-detail-subid  
        Route::get('/surat-keluar/disposisi/subid/{id}','Api\DisposisiKeluarSubidController@viewDisposisiSubidDetail');

        //disposisikeluar per kabid
        Route::get('/surat-keluar/disposisi/kabid/','Api\DisposisiKeluarKabidController@viewDisposisiKabidSpesifik');
        Route::post('/surat-keluar/disposisi/kabid/{id}','Api\DisposisiKeluarKabidController@teruskanDisposisiKabid');

        //disposisikeluar per subid
        Route::get('/surat-keluar/disposisi/subid/','Api\DisposisiKeluarSubidController@viewDisposisiSubidSpesifik');
       
    });

});

