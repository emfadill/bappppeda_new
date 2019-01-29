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

class DisposisiKeluarKabidController extends Controller
{
     public function viewDisposisiKabid($id)
    {
       $suratKeluar = SuratKeluar::where('id','=',$id)
                        ->orderBy('jenis_surat','ASC')
                        ->latest()
                        ->get();
       
       
        $disposisiKabid = DisposisiKeluarKabid::with('get_user')->where('surat_keluar_id','=',$id)->get();   
        foreach ($disposisiKabid as $keys) {
            $keys->viewDKKabidDetail = [
                'href' => 'api/v1/surat-keluar/disposisi/kabid/' .$keys->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($keys->url_disposisi)
            ];

            
            if($keys->kepada != null){
                $disposisiSubid = DisposisiKeluarSubid::with('get_user')->where('diposisi_keluar_id','=',$keys->id)->get();   
                foreach ($disposisiSubid as $keys12345) {
                        $keys12345->viewDKSubidDetail = [
                            'href' => 'api/v1/surat-keluar/disposisi/subid/' .$keys12345->id,
                            'method' => 'GET',
                            'url_doc_disposisi' => url($keys12345->url_disposisi)
                        ];
                }
                $keys->DKSubid = [
                    'Disposisi Keluar Subid' => $disposisiSubid
                ];
            }else{
                $keys->teruskanDKKeSubid = [
            'href' => 'api/v1/surat-keluar/disposisi/kabid/' .$keys->id,
            'params' => 'kepada,disposisi',
            'method' => 'POST'
        ];
            }
        
        }
        $suratKeluar->DisposisiKeluar = [
            'Disposisi Keluar' => $disposisiKabid
        ]; 
    
        $response = [
          'msg' => 'List Data Disposisi Keluar Dari Surat ' .$suratKeluar->indeks,
          'suratKeluar' => $suratKeluar
        ];
        return response()->json($response,200);
    }

    public function viewDisposisiKabidSpesifik()
    {
        $disposisiKabid = DisposisiKeluarKabid::with('get_user')->where('user_id','=',Auth::User()->id)->get();  
        foreach ($disposisiKabid as $key) {
            $key->viewDKKabidDetail = [
                'href' => 'api/v1/surat-keluar/disposisi/kabid/' .$key->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($key->url_disposisi)
            ];

             if($key->kepada != null){
                $disposisiSubid = DisposisiKeluarSubid::with('get_user')->where('diposisi_keluar_id','=',$key->id)->get();   
                foreach ($disposisiSubid as $keys12345) {
                        $keys12345->viewDKSubidDetail = [
                            'href' => 'api/v1/surat-keluar/disposisi/subid/' .$keys12345->id,
                            'method' => 'GET',
                            'url_doc_disposisi' => url($keys12345->url_disposisi)
                        ];
                }
                $key->DKSubid = [
                    'Disposisi Keluar Subid' => $disposisiSubid
                ];
            }else{
                $key->teruskanDKKeSubid = [
            'href' => 'api/v1/surat-keluar/disposisi/kabid/' .$key->id,
            'params' => 'kepada,disposisi',
            'method' => 'POST'
        ];
            }
           
            $suratKeluar = SuratKeluar::where('id','=',$key->surat_keluar_id)
                                        ->orderBy('jenis_surat','ASC')
                                        ->latest()
                                        ->get();
                foreach ($suratKeluar as $keys) {
                      

                }
                $key->suratKeluar = [
                    'Surat Keluar' => $suratKeluar
                ];
         } 
     
        $response = [
          'msg' => 'List Data Disposisi Keluar ' .Auth::User()->name,
          'suratKeluar' => $disposisiKabid
        ];
        return response()->json($response,200);
    }

    public function viewDisposisiKabidDetail($id)
    {
       $disposisiKabid = DisposisiKeluarKabid::with('get_user')->findOrFail($id);
        $suratKeluar = SuratKeluar::where('id','=',$disposisiKabid->surat_keluar_id)->first();


        /*$suratKeluar = SuratKeluar::where('id','=',$disposisiKabid->surat_keluar_id)
            ->orderBy('jenis_surat','ASC')
            ->latest()
            ->get();*/
        $suratKeluar->viewDKKabidAll = [
        	'href' => 'api/v1/surat-keluar/disposisi/kabid/',
            'method' => 'GET'
        ];

            if($disposisiKabid->kepada != null){
                $disposisiSubid = DisposisiKeluarSubid::with('get_user')->where('diposisi_keluar_id','=',$disposisiKabid->id)->get();   
                foreach ($disposisiSubid as $keys12345) {
                        $keys12345->viewDKSubidDetail = [
                            'href' => 'api/v1/surat-keluar/disposisi/subid/' .$keys12345->id,
                            'method' => 'GET',
                            'url_doc_disposisi' => url($keys12345->url_disposisi)
                        ];
                }
                $disposisiKabid->DKSubid = [
                    'Disposisi Keluar Subid' => $disposisiSubid
                ];
            }else{
                $disposisiKabid->teruskanDKKeSubid = [
            'href' => 'api/v1/surat-keluar/disposisi/kabid/' .$disposisiKabid->id,
            'params' => 'kepada,disposisi',
            'method' => 'POST'
        ];
            }
        
        $suratKeluar->DKKabid = [
            'Disposisi Keluar Kabid' => $disposisiKabid
        ];

        $response = [
          'msg' => 'Surat Keluar ' .$suratKeluar->indeks .' Detail',
          'suratKeluar' => $suratKeluar
        ];
        return response()->json($response,200);
    }

    public function teruskanDisposisiKabid(Request $request,$id){
         $disposisiKabid = DisposisiKeluarKabid::findOrFail($id);
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
            $request->file->storeAs('public/surat_keluar/disposisi', $name);
            $path = 'storage/surat_keluar/disposisi/' . $name;
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
        $disposisiKabid = DisposisiKeluarKabid::findOrFail($id);
        $disposisiKabid->kepada = $dataKepada;
        $disposisiKabid->save();

        foreach ($splitKepada as $key) {
            if($key == ""){

            }else{
                $newDisposisiSubid = new DisposisiKeluarSubid([
                    'user_id' => $key,
                    'diposisi_keluar_id' => $id,
                    'disposisi' => $name,
                    'url_disposisi' => $path
                ]);
                $newDisposisiSubid->save();
            //notif untuk subid
            }
        }

        $suratDisposisiSubid = DisposisiKeluarSubid::where('diposisi_keluar_id','=',$id)->get();
        foreach ($suratDisposisiSubid as $key) {
            $key->viewDKSubidDetail = [
                'href' => 'api/v1/surat-keluar/disposisi/subid/' .$key->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($key->url_disposisi)
            ];
        }
        $disposisiKabid->viewDKSubid = [
            'href' => 'api/v1/surat-keluar-disposisi-subid/' .$id ,
            'method' => 'GET',
            'suratKeluarDisposisiSubid' => $suratDisposisiSubid
        ];

        $disposisiKabid->DKKabid = [
            'href' => 'api/v1/surat-keluar-disposisi-kabid/' .$disposisiKabid->get_surat->id ,
            'method' => 'GET',
        ];

        $disposisiKabid->viewDKKabidDetail = [
              'href' => 'api/v1/surat-keluar/disposisi/kabid/' .$disposisiKabid->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($disposisiKabid->url_disposisi)
        ];

        $disposisiKabid->viewDKKabidAll= [
            'href' => 'api/v1/surat-keluar/disposisi/kabid/',
            'method' => 'GET'
        ];

        $response = [
            'msg' => 'Surat ' .$disposisiKabid->get_surat->indeks .' Berhasil di teruskan ke Subid!',
            'suratKeluar' => $disposisiKabid
        ];

        return response()->json($response,200);

    }
}
