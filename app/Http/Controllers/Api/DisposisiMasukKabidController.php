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

class DisposisiMasukKabidController extends Controller
{
    public function viewDisposisiKabid($id)
    {
       $suratMasuk = SuratMasuk::where('id','=',$id)->first();
       
       
        $disposisiKabid = DisposisiMasukKabid::with('get_user')->where('surat_masuk_id','=',$id)->get();   
        foreach ($disposisiKabid as $keys) {
            $keys->viewDMKabidDetail = [
                'href' => 'api/v1/surat-masuk/disposisi/kabid/' .$keys->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($keys->url_disposisi)
            ];

            
            if($keys->kepada != null){
                $disposisiSubid = DisposisiMasukSubid::with('get_user')->where('diposisi_masuk_id','=',$keys->id)->get();   
                foreach ($disposisiSubid as $keys12345) {
                        $keys12345->viewDMSubidDetail = [
                            'href' => 'api/v1/surat-masuk/disposisi/subid/' .$keys12345->id,
                            'method' => 'GET',
                            'url_doc_disposisi' => url($keys12345->url_disposisi)
                        ];
                }
                $keys->DMSubid = [
                    'Disposisi Masuk Subid' => $disposisiSubid
                ];
            }else{
                $keys->teruskanDMKeSubid = [
            'href' => 'api/v1/surat-masuk/disposisi/kabid/' .$keys->id,
            'params' => 'kepada,disposisi',
            'method' => 'POST'
        ];
            }
        
        }
        $suratMasuk->DisposisiMasuk = [
            'Disposisi Masuk' => $disposisiKabid
        ]; 
    
        $response = [
          'msg' => 'List Data Disposisi masuk Dari Surat ' .$suratMasuk->indeks,
          'suratMasuk' => $suratMasuk
        ];
        return response()->json($response,200);
    }

    public function viewDisposisiKabidSpesifik()
    {
        $disposisiKabid = DisposisiMasukKabid::with('get_user')->where('user_id','=',Auth::User()->id)->get();  
        foreach ($disposisiKabid as $key) {
            $key->viewDMKabidDetail = [
                'href' => 'api/v1/surat-masuk/disposisi/kabid/' .$key->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($key->url_disposisi)
            ];

             if($key->kepada != null){
                $disposisiSubid = DisposisiMasukSubid::with('get_user')->where('diposisi_masuk_id','=',$key->id)->get();   
                foreach ($disposisiSubid as $keys12345) {
                        $keys12345->viewDMSubidDetail = [
                            'href' => 'api/v1/surat-masuk/disposisi/subid/' .$keys12345->id,
                            'method' => 'GET',
                            'url_doc_disposisi' => url($keys12345->url_disposisi)
                        ];
                }
                $key->DMSubid = [
                    'Disposisi Masuk Subid' => $disposisiSubid
                ];
            }else{
                $key->teruskanDMKeSubid = [
            'href' => 'api/v1/surat-masuk/disposisi/kabid/' .$key->id,
            'params' => 'kepada,disposisi',
            'method' => 'POST'
        ];
            }
           
            $suratMasuk = SuratMasuk::where('id','=',$key->surat_masuk_id)->get();
                foreach ($suratMasuk as $keys) {
                     

                }
                $key->suratMasuk = [
                    'Surat Masuk' => $suratMasuk
                ];
         } 
     
        $response = [
          'msg' => 'List Data Disposisi Masuk ' .Auth::User()->name,
          'suratMasuk' => $disposisiKabid
        ];
        return response()->json($response,200);
    }

    public function viewDisposisiKabidDetail($id)
    {
       $disposisiKabid = DisposisiMasukKabid::with('get_user')->findOrFail($id);   
       $suratMasuk = SuratMasuk::where('id','=',$disposisiKabid->surat_masuk_id)->first();
       
        $suratMasuk->viewDMKabidAll = [
        	'href' => 'api/v1/surat-masuk/disposisi/kabid/',
            'method' => 'GET'
        ];
       
            if($disposisiKabid->kepada != null){
                $disposisiSubid = DisposisiMasukSubid::with('get_user')->where('diposisi_masuk_id','=',$disposisiKabid->id)->get();   
                foreach ($disposisiSubid as $keys12345) {
                        $keys12345->viewDMSubidDetail = [
                            'href' => 'api/v1/surat-masuk/disposisi/subid/' .$keys12345->id,
                            'method' => 'GET',
                            'url_doc_disposisi' => url($keys12345->url_disposisi)
                        ];
                }
                $disposisiKabid->DMSubid = [
                    'Disposisi Masuk Subid' => $disposisiSubid
                ];
            }else{
                $disposisiKabid->teruskanDMKeSubid = [
            'href' => 'api/v1/surat-masuk/disposisi/kabid/' .$disposisiKabid->id,
            'params' => 'kepada,disposisi',
            'method' => 'POST'
        ];
            }
        
        $suratMasuk->DMKabid = [
            'Disposisi Masuk Kabid' => $disposisiKabid
        ];

        $response = [
          'msg' => 'Surat Masuk ' .$suratMasuk->indeks .' Detail',
          'suratMasuk' => $suratMasuk
        ];
        return response()->json($response,200);
    }

    public function teruskanDisposisiKabid(Request $request,$id){
         $disposisiKabid = DisposisiMasukKabid::findOrFail($id);
        if($disposisiKabid->kepada != null){
              $response = [
            'msg' => 'Surat ini Sudah di teruskan!',
        ];
        return response()->json($response,200);

    }
        $this->validate($request, [
            'kepada' => 'required',
            'file' => 'required',
            'file.*' => 'file|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('file')) {

            $filename = $request->file->getClientOriginalName();
            $name_only = pathinfo($filename, PATHINFO_FILENAME);
            $ext_only = $request->file->getClientOriginalExtension();

            $name_file = str_replace(" ", "-", strtolower($name_only));
            $name = $name_file . '-' . date('His') . '.' . $ext_only;
            $request->file->storeAs('public/surat_masuk/disposisi', $name);
            $path = 'storage/surat_masuk/disposisi/' . $name;
        }

        $kepada = $request->input('kepada');
        $splitKepada = explode(",",$kepada);
                
        foreach ($splitKepada as $key) {
            if($key == ""){

            }else{
                 $user = User::with('get_jabatan','get_kabid','get_subid')->findOrFail($key);
            $dataUser[] = $user->get_subid->name;
            }           
        }
        $dataKepada = implode(",",$dataUser);
        $disposisiKabid = DisposisiMasukKabid::findOrFail($id);
        $disposisiKabid->kepada = $dataKepada;
        $disposisiKabid->save();

        foreach ($splitKepada as $key) {
            if($key == ""){

            }else{
                $newDisposisiSubid = new DisposisiMasukSubid([
                    'user_id' => $key,
                    'diposisi_masuk_id' => $id,
                    'disposisi' => $name,
                    'url_disposisi' => $path
                ]);
                $newDisposisiSubid->save();
            //notif untuk subid
            }
        }

        $suratDisposisiSubid = DisposisiMasukSubid::where('diposisi_masuk_id','=',$id)->get();
        foreach ($suratDisposisiSubid as $key) {
            $key->viewDMSubidDetail = [
                'href' => 'api/v1/surat-masuk/disposisi/subid/' .$key->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($key->url_disposisi)
            ];
        }
        $disposisiKabid->viewDMSubid = [
            'href' => 'api/v1/surat-masuk-disposisi-subid/' .$id ,
            'method' => 'GET',
            'suratMasukDisposisiSubid' => $suratDisposisiSubid
        ];

        $disposisiKabid->DMKabid = [
            'href' => 'api/v1/surat-masuk-disposisi-kabid/' .$disposisiKabid->get_surat->id ,
            'method' => 'GET',
        ];

        $disposisiKabid->viewDMKabidDetail = [
              'href' => 'api/v1/surat-masuk/disposisi/kabid/' .$disposisiKabid->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($disposisiKabid->url_disposisi)
        ];

        $disposisiKabid->viewDMKabidAll= [
            'href' => 'api/v1/surat-masuk/disposisi/kabid/',
            'method' => 'GET'
        ];

        $response = [
            'msg' => 'Surat ' .$disposisiKabid->get_surat->indeks .' Berhasil di teruskan ke Subid!',
            'suratMasuk' => $disposisiKabid
        ];

        return response()->json($response,200);

    }
}
