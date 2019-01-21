<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Component\Model\DisposisiKeluarSubid;
use App\Component\Model\DisposisiKeluarKabid;
use App\Component\Model\SuratKeluar;
use App\Component\Model\User;
use JWTAuth;
use JWTAuthException;
use Auth;

class DisposisiKeluarSubidController extends Controller
{
    // public function viewDisposisiSubid($id)
    // {
    //    $disposisiKabid = DisposisiKeluarKabid::where('id','=',$id)->first();
    //    $suratMasuk = SuratMasuk::where('id','=',$disposisiKabid->get_surat->id)->first();
    //    $suratMasuk->viewSMDetail = [
    //         'href' => 'api/v1/surat-keluar/' .$suratMasuk->id,
    //         'url_doc' => url($suratMasuk->url_dokumen),
    //         'method' => 'GET'
    //     ];

       
    //     $disposisiKabid = DisposisiKeluarKabid::with('get_user')->where('surat_keluar_id','=',$id)->get();   
    //     foreach ($disposisiKabid as $keys) {
    //         $keys->viewDMKabidDetail = [
    //             'href' => 'api/v1/surat-keluar/disposisi/kabid/' .$keys->id,
    //             'method' => 'GET',
    //             'url_doc_disposisi' => url($keys->url_disposisi)
    //         ];

    //         if($keys->kepada != null){
    //         	$disposisiSubid = DisposisiKeluarSubid::with('get_user')->where('surat_keluar_id','=',$id)->get();   
    //         }
    //     } 
    
    //     $response = [
    //       'msg' => 'List Data Surat Masuk',
    //       'suratMasuk' => $suratMasuk,
    //       'Disposisi Masuk' => $disposisiKabid
    //     ];
    //     return response()->json($response,200);
    // }

     public function viewDisposisiSubidSpesifik()
    {
        $disposisiSubid = DisposisiKeluarSubid::with('get_user','get_disposisi')->where('user_id','=',Auth::User()->id)->get();  
        foreach ($disposisiSubid as $key) {
            $key->viewDKSubidDetail = [
                'href' => 'api/v1/surat-keluar/disposisi/subid/' .$key->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($key->url_disposisi)
            ];

            $suratKeluar = SuratKeluar::where('id','=',$key->get_disposisi->surat_keluar_id)->get();
                foreach ($suratKeluar as $keys) {
                     

                }
                $key->suratKeluar = [
                    'Surat Keluar' => $suratKeluar
                ];
         } 
     
        $response = [
          'msg' => 'List Data Disposisi Keluar ' .Auth::User()->name,
          'suratKeluar' => $disposisiSubid
        ];
        return response()->json($response,200);
    }

  public function viewDisposisiSubidDetail($id)
    {
       $disposisiSubid = DisposisiKeluarSubid::with('get_user','get_disposisi')->findOrFail($id);   
       $suratKeluar = SuratKeluar::where('id','=',$disposisiSubid->get_disposisi->surat_keluar_id)->first();
       
        $suratKeluar->viewDKKabidAll = [
        	'href' => 'api/v1/surat-keluar/disposisi/kabid/',
            'method' => 'GET'
        ];
      	 $suratKeluar->viewDKSubidAll = [
        	'href' => 'api/v1/surat-keluar/disposisi/subid/',
            'method' => 'GET'
        ];
            
        
        $suratKeluar->DKSubid = [
            'Disposisi Keluar Subid' => $disposisiSubid
        ];

        $response = [
          'msg' => 'Surat Keluar ' .$suratKeluar->indeks .' Detail',
          'suratKeluar' => $suratKeluar
        ];
        return response()->json($response,200);
    }
}
