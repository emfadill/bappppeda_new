<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Component\Model\DisposisiMasukSubid;
use App\Component\Model\DisposisiMasukKabid;
use App\Component\Model\SuratMasuk;
use App\Component\Model\Jabatan;
use App\Component\Model\User;
use JWTAuth;
use JWTAuthException;
use Auth;

class SuratMasukController extends Controller
{
    public function viewSuratMasuk()
    {
        $suratMasuk = SuratMasuk::orderBy('jenis_surat','ASC')
                            ->latest()
                            ->get();

        foreach ($suratMasuk as $key)
    {
        if($key->status == 'Sudah Disposisi'){  
        $disposisiKabid = DisposisiMasukKabid::with('get_user')->where('surat_masuk_id','=',$key->id)->get();   
        foreach ($disposisiKabid as $keys) {
            $keys->viewDMKabidDetail = [
                'href' => 'api/v1/surat-masuk/disposisi/kabid/' .$keys->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($keys->url_disposisi)
            ];
            if($keys->kepada != null) {
                $disposisiSubid = DisposisiMasukSubid::with('get_user')->where('diposisi_masuk_id','=',$keys->id)->get();
                foreach ($disposisiSubid as $key123) {
                    $key123->viewDMSubidDetail = [
                        'href' => 'api/v1/surat-masuk/disposisi/subid/' .$key123->id,
                        'method' => 'GET',
                        'url_doc_disposisi' => url($key123->url_disposisi)
                    ];
                    
                }
            $keys->viewDMSubid = [
                    'suratMasukDisposisiSubid' => $disposisiSubid
                    ];
           
            }
        }
        $key->detailSM = [
            'href' => 'api/v1/surat-masuk-disposisi-kabid/' .$key->id,
            'method' => 'GET',
            'suratMasukDisposisiKabid' => $disposisiKabid
        ];
       
        }else{
             $key->detailSM = [
            'href' => 'api/v1/surat-masuk/' .$key->id,
            'method' => 'GET'
        ];
        }
        if($key->kepada != null){

        }else{
            $key->teruskanSM = [
            'href' => 'api/v1/surat-masuk/' .$key->id,
            'params' => 'kepada,disposisi',
            'method' => 'POST'
        ];
        }
        
    }
        $response = [
          'msg' => 'List Data Surat Masuk',
          'suratMasuk' => $suratMasuk
        ];
        return response()->json($response,200);
    }

    // public function viewSuratMasukSpesifik()
    // {
    //     $idUser = Auth::User()->id;

    //     $suratMasuk = SuratMasuk::with('get_user')
    //                             ->whereHas('get_user',function ($query) use ($idUser){
    //                                 $query->whereIn('id',[$idUser]);
    //                             })
    //                             ->orderBy('jenis_surat','ASC')
    //                             ->latest()
    //                             ->get();

    //     foreach ($suratMasuk as $key)
    //     {
    //         $key->viewSMDetail = [
    //             'href' => 'api/v1/surat-masuk/' .$key->id,
    //             'url_doc' => url($key->url_dokumen),
    //             'method' => 'GET'
    //         ];

    //         $key->teruskanSM = [
    //             'href' => 'api/v1/surat-masuk/' .$key->id,
    //             'params' => 'kepada,status,user_id,cek,disposisi,url_disposisi',
    //             'method' => 'POST'
    //         ];
    //     }
    //     $response = [
    //         'msg' => 'List Data Surat Masuk',
    //         'suratMasuk' => $suratMasuk
    //     ];
    //     return response()->json($response,200);
    // }

    public function viewSuratMasukDetail($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);

        if($suratMasuk->status == 'Sudah Disposisi'){  
        $disposisiKabid = DisposisiMasukKabid::where('surat_masuk_id','=',$suratMasuk->id)->get();   
        foreach ($disposisiKabid as $keys) {
            $keys->viewDMKabidDetail = [
                'href' => 'api/v1/surat-masuk/disposisi/kabid/' .$keys->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($keys->url_disposisi)
            ];
            if($keys->kepada != null) {
                $disposisiSubid = DisposisiMasukSubid::where('diposisi_masuk_id','=',$keys->id)->get();
                foreach ($disposisiSubid as $key123) {
                    $key123->viewDMSubidDetail = [
                        'href' => 'api/v1/surat-masuk/disposisi/subid/' .$key123->id,
                        'method' => 'GET',
                        'url_doc_disposisi' => url($key123->url_disposisi)
                    ];
                   
                }
            $keys->ViewDMSubid = [
                    'href' => 'api/v1/surat-masuk-disposisi-subid/' .$keys->id ,
                    'method' => 'GET',
                    'suratMasukDisposisiSubid' => $disposisiSubid
                    ];
            
            }
        }
        $suratMasuk->viewDMKabid = [
             'href' => 'api/v1/surat-masuk-disposisi-kabid/' .$suratMasuk->id,
            'method' => 'GET',
            'suratMasukDisposisiKabid' => $disposisiKabid
        ];
        
        }

        $suratMasuk->viewSMAll = [
                'href' => 'api/v1/surat-masuk',
                'method' => 'GET'
            ];

        $suratMasuk->teruskanSM = [
                'href' => 'api/v1/surat-masuk/' .$suratMasuk->id,
                'params' => 'kepada,disposisi',
                'method' => 'POST'
            ];

        $response = [
            'msg' => 'View Surat Masuk Detail Dari ' .$suratMasuk->indeks,
            'suratMasuk' => $suratMasuk
        ];
        return response()->json($response,200);
    }

    public function updateSuratMasuk(Request $request,$id){
          $suratMasuk = SuratMasuk::findOrFail($id);
        if($suratMasuk->kepada != null){
              $response = [
            'msg' => 'Surat ini Sudah di teruskan!',
        ];
        return response()->json($response,200);

    }
        $this->validate($request, [
            'tgl_penyelesaian' => 'required',
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
        $splitKepada = explode(", ",$kepada);
        $jabatan_skt = Jabatan::where('name','=','Sekretaris')->first();
        $sekretaris = User::with('get_jabatan','get_kabid','get_subid')->where('jabatan_id','=',$jabatan_skt->id)->first();

        foreach ($splitKepada as $key) {
            if($key == ""){

            }else{
                $user = User::with('get_jabatan','get_kabid','get_subid')->findOrFail($key);
                 if($user->id == $sekretaris->id){
                    $dataUser[] = $user->get_jabatan->name;
                 }else{
            $dataUser[] = $user->get_kabid->name;
                 }
            }           
        }
        $dataKepada = implode(", ",$dataUser);
        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk->tgl_penyelesaian = $request->input('tgl_penyelesaian');
        $suratMasuk->kepada = $dataKepada;
        $suratMasuk->status = 'Sudah Disposisi';
        $suratMasuk->disposisi = $name;
        $suratMasuk->url_disposisi = $path;
        $suratMasuk->save();

        foreach ($splitKepada as $key) {
            if($key == ""){

            }else{
                $newDisposisiKabid = new DisposisiMasukKabid([
                    'user_id' => $key,
                    'surat_masuk_id' => $id,
                    'disposisi' => $name,
                    'url_disposisi' => $path
                ]);
                $newDisposisiKabid->save();
            //notif untuk kabid
            }
        }

        $suratDisposisiKabid = DisposisiMasukKabid::where('surat_masuk_id','=',$id)->get();
        foreach ($suratDisposisiKabid as $key) {
            $key->viewDMKabidDetail = [
                'href' => 'api/v1/surat-masuk/disposisi/kabid/' .$key->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($key->url_disposisi)
            ];
        }
        $suratMasuk->viewDMKabid = [
            'href' => 'api/v1/surat-masuk-disposisi-kabid/' .$id ,
            'method' => 'GET',
            'suratMasukDisposisiKabid' => $suratDisposisiKabid
        ];

        $suratMasuk->viewSMAll = [
            'href' => 'api/v1/surat-masuk',
            'method' => 'GET'
        ];

        $response = [
            'msg' => 'Surat ' .$suratMasuk->indeks .' Berhasil di teruskan ke Kabid!',
            'suratMasuk' => $suratMasuk
        ];

        return response()->json($response,200);

    }

    public function data_user()
    {
        $count = User::count();
        $skip = 1;
        $limit = $count - $skip;
        $user = User::skip($skip)->take($limit)->get();

        $response = [
            'msg' => 'List Data User',
            'suratMasuk' => $user
        ];
        return response()->json($response,200);
    }

    public function search_dokumen(request $request)
    {
        $data = $request->input('search');
        $suratMasuk = SuratMasuk::where('dokumen','like',"%{$data}%")
            ->get();

        foreach ($suratMasuk as $key)
        {
            $key->viewSMDetail = [
                'href' => 'api/v1/surat-masuk/' .$key->id,
                'url_doc' => url($key->url_dokumen),
                'method' => 'GET'
            ];

            $key->teruskanSM = [
                'href' => 'api/v1/surat-masuk/' .$key->id,
                'params' => 'kepada,status,user_id,cek,disposisi,url_disposisi',
                'method' => 'POST'
            ];
        }
        $response = [
            'msg' => 'List Data Pencarian Data Surat Masuk Dari ' .$data,
            'suratMasuk' => $suratMasuk
        ];
        return response()->json($response,200);
    }

    public function search_dokumen_spesifik(request $request)
    {
        $idUser = Auth::User()->id;

        $data = $request->input('search');
        $disposisiKabid = DisposisiMasukKabid::with('get_user')
            ->whereHas('get_user',function ($query) use ($idUser){
                $query->whereIn('id',[$idUser]);
            })
            ->where('disposisi','like',"%{$data}%")
            ->get();

        foreach ($disposisiKabid as $key)
        {
            $key->viewDMDetail = [
                'href' => 'api/v1/surat-masuk/disposisi/kabid/' .$key->id,
                'url_doc' => url($key->url_disposisi),
                'method' => 'GET'
            ];

            $key->teruskanSM = [
                'href' => 'api/v1/surat-masuk/disposisi/kabid/' .$key->id,
                'params' => 'kepada,disposisi,url_disposisi',
                'method' => 'POST'
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

            $suratMasuk = SuratMasuk::where('id','=',$key->surat_masuk_id)
                ->orderBy('jenis_surat','ASC')
                ->latest()
                ->get();

            foreach ($suratMasuk as $keys) {


            }
            $key->suratMasuk = [
                'Surat Masuk' => $suratMasuk
            ];
        }
        $response = [
            'msg' => 'List Data Pencarian Disposisi Surat Masuk Dari ' .$data,
            'disposisiKabid' => $disposisiKabid
        ];
        return response()->json($response,200);
    }

    public function search_dokumen_spesifik_subid(request $request)
    {
        $idUser = Auth::User()->id;

        $data = $request->input('search');
        $disposisiSubid = DisposisiMasukSubid::with('get_user')
            ->whereHas('get_user',function ($query) use ($idUser){
                $query->whereIn('id',[$idUser]);
            })
            ->where('disposisi','like',"%{$data}%")
            ->get();

        foreach ($disposisiSubid as $key)
        {
            $key->viewDMDetail = [
                'href' => 'api/v1/surat-masuk/disposisi/subid/' .$key->id,
                'url_doc' => url($key->url_disposisi),
                'method' => 'GET'
            ];

            $suratMasuk = SuratMasuk::where('id','=',$key->get_disposisi->surat_masuk_id)
                ->orderBy('jenis_surat','ASC')
                ->latest()
                ->get();
            foreach ($suratMasuk as $keys) {


            }
            $key->suratMasuk = [
                'Surat Masuk' => $suratMasuk
            ];
        }
        $response = [
            'msg' => 'List Data Pencarian Disposisi Surat Masuk Dari ' .$data,
            'disposisiSubid' => $disposisiSubid
        ];
        return response()->json($response,200);
    }

}
