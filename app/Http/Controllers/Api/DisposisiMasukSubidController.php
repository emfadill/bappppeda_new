<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Component\Model\DisposisiMasukSubid;
use App\Component\Model\DisposisiMasukKabid;
use App\Component\Model\SuratMasuk;
use App\Component\Model\User;
use JWTAuth;
use JWTAuthException;
use Auth;

class DisposisiMasukSubidController extends Controller
{
    // public function viewDisposisiSubid($id)
    // {
    //    $disposisiKabid = DisposisiMasukKabid::where('id','=',$id)->first();
    //    $suratMasuk = SuratMasuk::where('id','=',$disposisiKabid->get_surat->id)->first();
    //    $suratMasuk->viewSMDetail = [
    //         'href' => 'api/v1/surat-masuk/' .$suratMasuk->id,
    //         'url_doc' => url($suratMasuk->url_dokumen),
    //         'method' => 'GET'
    //     ];

       
    //     $disposisiKabid = DisposisiMasukKabid::with('get_user')->where('surat_masuk_id','=',$id)->get();   
    //     foreach ($disposisiKabid as $keys) {
    //         $keys->viewDMKabidDetail = [
    //             'href' => 'api/v1/surat-masuk/disposisi/kabid/' .$keys->id,
    //             'method' => 'GET',
    //             'url_doc_disposisi' => url($keys->url_disposisi)
    //         ];

    //         if($keys->kepada != null){
    //         	$disposisiSubid = DisposisiMasukSubid::with('get_user')->where('surat_masuk_id','=',$id)->get();   
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
        $disposisiSubid = DisposisiMasukSubid::with('get_user','get_disposisi')->where('user_id','=',Auth::User()->id)->get();  
        foreach ($disposisiSubid as $key) {
            $key->viewDMSubidDetail = [
                'href' => 'api/v1/surat-masuk/disposisi/subid/' .$key->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($key->url_disposisi)
            ];

            $suratMasuk = SuratMasuk::where('id','=',$key->get_disposisi->surat_masuk_id)->get();
                foreach ($suratMasuk as $keys) {
                     

                }
                $key->suratMasuk = [
                    'Surat Masuk' => $suratMasuk
                ];
         } 
     
        $response = [
          'msg' => 'List Data Disposisi Masuk ' .Auth::User()->name,
          'suratMasuk' => $disposisiSubid
        ];
        return response()->json($response,200);
    }

  public function viewDisposisiSubidDetail($id)
    {
       $disposisiSubid = DisposisiMasukSubid::with('get_user','get_disposisi')->findOrFail($id);   
       $suratMasuk = SuratMasuk::where('id','=',$disposisiSubid->get_disposisi->surat_masuk_id)->first();
       
        $suratMasuk->viewDMKabidAll = [
        	'href' => 'api/v1/surat-masuk/disposisi/kabid/',
            'method' => 'GET'
        ];
      	 $suratMasuk->viewDMSubidAll = [
        	'href' => 'api/v1/surat-masuk/disposisi/subid/',
            'method' => 'GET'
        ];
            
        
        $suratMasuk->DMSubid = [
            'Disposisi Masuk Subid' => $disposisiSubid
        ];

        $response = [
          'msg' => 'Surat Masuk ' .$suratMasuk->indeks .' Detail',
          'suratMasuk' => $suratMasuk
        ];
        return response()->json($response,200);
    }

}
