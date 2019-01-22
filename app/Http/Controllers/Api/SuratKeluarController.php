<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Component\Model\DisposisiKeluarSubid;
use App\Component\Model\DisposisiKeluarKabid;
use App\Component\Model\SuratKeluar;
use App\Component\Model\User;
use App\Component\Model\Jabatan;
use JWTAuth;
use JWTAuthException;
use Auth;


class SuratKeluarController extends Controller
{
    public function viewSuratKeluar()
    {
        $suratKeluar = SuratKeluar::orderBy('jenis_surat','ASC')
                                    ->latest()
                                    ->get();

        foreach ($suratKeluar as $key)
        {
            if($key->status == 'Sudah Disposisi'){  
        $disposisiKabid = DisposisiKeluarKabid::with('get_user')->where('surat_keluar_id','=',$key->id)->get();   
        foreach ($disposisiKabid as $keys) {
            $keys->viewDKKabidDetail = [
                'href' => 'api/v1/surat-keluar/disposisi/kabid/' .$keys->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($keys->url_disposisi)
            ];
            if($keys->kepada != null) {
                $disposisiSubid = DisposisiKeluarSubid::with('get_user')->where('diposisi_keluar_id','=',$keys->id)->get();
                foreach ($disposisiSubid as $key123) {
                    $key123->viewDKSubidDetail = [
                        'href' => 'api/v1/surat-keluar/disposisi/subid/' .$key123->id,
                        'method' => 'GET',
                        'url_doc_disposisi' => url($key123->url_disposisi)
                    ];
                    
                }
            $keys->viewDKSubid = [
                    'suratKeluarDisposisiSubid' => $disposisiSubid
                    ];
           
            }
        }
        $key->detailSK = [
            'href' => 'api/v1/surat-keluar-disposisi-kabid/' .$key->id,
            'method' => 'GET',
            'suratKeluarDisposisiKabid' => $disposisiKabid
        ];
       
        }else{
             $key->viewSKDetail = [
                'href' => 'api/v1/surat-keluar/' .$key->id,
                'url_doc' => url($key->url_dokumen),
                'method' => 'GET'
            ];
              $key->teruskanSK = [
                'href' => 'api/v1/surat-keluar/' .$key->id,
                'params' => 'kepada,status,user_id,cek,dokumen_ttd,disposisi',
                'method' => 'POST'
            ];
        }
        }
        $response = [
            'msg' => 'List Data Surat Keluar',
            'suratKeluar' => $suratKeluar
        ];
        return response()->json($response,200);
    }

    // public function viewSuratKeluarSpesifik()
    // {
    //     $idUser = Auth::User()->id;

    //     $suratKeluar = SuratKeluar::with('get_user')
    //         ->whereHas('get_user',function ($query) use ($idUser){
    //             $query->whereIn('id',[$idUser]);
    //         })
    //         ->orderBy('jenis_surat','ASC')
    //         ->latest()
    //         ->get();

    //     foreach ($suratKeluar as $key)
    //     {
    //         $key->viewSuratKeluarDetail = [
    //             'href' => 'api/v1/surat-keluar/' .$key->id,
    //             'url_doc' => url($key->url_dokumen),
    //             'method' => 'GET'
    //         ];

    //         $key->updateSuratKeluar = [
    //             'href' => 'api/v1/surat-keluar/' .$key->id,
    //             'params' => 'kepada,status,user_id,cek,disposisi,url_disposisi',
    //             'method' => 'POST'
    //         ];
    //     }
    //     $response = [
    //         'msg' => 'List Data Surat Keluar',
    //         'suratKeluar' => $suratKeluar
    //     ];
    //     return response()->json($response,200);
    // }

    public function viewSuratKeluarDetail($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);

        if($suratKeluar->status == 'Sudah Disposisi'){  
        $disposisiKabid = DisposisiKeluarKabid::where('surat_keluar_id','=',$suratKeluar->id)->get();   
        foreach ($disposisiKabid as $keys) {
            $keys->viewDKKabidDetail = [
                'href' => 'api/v1/surat-keluar/disposisi/kabid/' .$keys->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($keys->url_disposisi)
            ];
            if($keys->kepada != null) {
                $disposisiSubid = DisposisiKeluarSubid::where('diposisi_keluar_id','=',$keys->id)->get();
                foreach ($disposisiSubid as $key123) {
                    $key123->viewDKSubidDetail = [
                        'href' => 'api/v1/surat-keluar/disposisi/subid/' .$key123->id,
                        'method' => 'GET',
                        'url_doc_disposisi' => url($key123->url_disposisi)
                    ];
                   
                }
            $keys->ViewDKSubid = [
                    'href' => 'api/v1/surat-keluar-disposisi-subid/' .$keys->id ,
                    'method' => 'GET',
                    'suratKeluarDisposisiSubid' => $disposisiSubid
                    ];
            
            }
        }
        $suratKeluar->viewDKKabid = [
             'href' => 'api/v1/surat-keluar-disposisi-kabid/' .$suratKeluar->id,
            'method' => 'GET',
            'suratKeluarDisposisiKabid' => $disposisiKabid
        ];
        
        }

        $suratKeluar->viewSKKeluar = [
            'href' => 'api/v1/surat-keluar',
            'method' => 'GET'
        ];

        $suratKeluar->teruskanSK = [
            'href' => 'api/v1/surat-keluar/' .$suratKeluar->id,
            'params' => 'kepada,dokumen_ttd,disposisi',
            'method' => 'POST'
        ];

        $response = [
            'msg' => 'View Surat Keluar Detail Dari ' .$suratKeluar->indeks,
            'suratKeluar' => $suratKeluar
        ];
        return response()->json($response,200);
    }

    public function updateSuratKeluar(Request $request,$id){
        $suratKeluar = SuratKeluar::findOrFail($id);
        if($suratKeluar->kepada != null){
              $response = [
            'msg' => 'Surat ini Sudah di teruskan!',
        ];
        return response()->json($response,200);

    }
        $this->validate($request, [
            'kepada' => 'required',
            'file' => 'required',
            'file.*' => 'file|mimes:pdf|max:2048',
            'disposisi' => 'required',
            'disposisi.*' => 'file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file->getClientOriginalName();
            $name_only = pathinfo($filename, PATHINFO_FILENAME);
            $ext_only = $request->file->getClientOriginalExtension();

            $name_file = str_replace(" ", "-", strtolower($name_only));
            $name = $name_file . '-' . date('His') . '.' . $ext_only;
            $request->file->storeAs('public/surat_keluar/dokumen_ttd', $name);
            $path = 'storage/surat_keluar/dokumen_ttd/' . $name;

            $filename_disposisi = $request->disposisi->getClientOriginalName();
            $name_only_disposisi = pathinfo($filename_disposisi, PATHINFO_FILENAME);
            $ext_only_disposisi = $request->disposisi->getClientOriginalExtension();

            $name_file_disposisi = str_replace(" ", "-", strtolower($name_only_disposisi));
            $name_disposisi = $name_file_disposisi . '-' . date('His') . '.' . $ext_only_disposisi;
            $request->disposisi->storeAs('public/surat_keluar/disposisi', $name_disposisi);
            $path_disposisi = 'storage/surat_keluar/disposisi/' . $name_disposisi;
        }

        $kepada = $request->input('kepada');
        $splitKepada = explode(",",$kepada);
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
        $dataKepada = implode(",",$dataUser);

        $suratKeluar = SuratKeluar::findOrFail($id);
        $suratKeluar->kepada = $dataKepada;
        $suratKeluar->status = 'Sudah Disposisi';
        /*$suratKeluar->instruksi = $request->input('instruksi');*/
        $suratKeluar->dokumen_ttd = $name;
        $suratKeluar->url_dokumen_ttd = $path;
        $suratKeluar->disposisi = $name_disposisi;
        $suratKeluar->url_disposisi = $path_disposisi;
        $suratKeluar->save();
            foreach ($splitKepada as $key) {
            if($key == ""){

            }else{
                $newDisposisiKabid = new DisposisiKeluarKabid([
                    'user_id' => $key,
                    'surat_keluar_id' => $id,
                    'disposisi' => $name_disposisi,
                    'url_disposisi' => $path_disposisi
                ]);
                $newDisposisiKabid->save();
            //notif untuk kabid
            }
        }

        $suratDisposisiKabid = DisposisiKeluarKabid::where('surat_keluar_id','=',$id)->get();
        foreach ($suratDisposisiKabid as $key) {
            $key->viewDKKabidDetail = [
                'href' => 'api/v1/surat-keluar/disposisi/kabid/' .$key->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($key->url_disposisi)
            ];
        }
        $suratKeluar->viewDKKabid = [
            'href' => 'api/v1/surat-keluar-disposisi-kabid/' .$id ,
            'method' => 'GET',
            'suratKeluarDisposisiKabid' => $suratDisposisiKabid
        ];

        $suratKeluar->viewSemuaSuratKeluar = [
            'href' => 'api/v1/surat-keluar',
            'method' => 'GET'
        ];

        $response = [
            'msg' => 'Surat ' .$suratKeluar->indeks .' Berhasil di teruskan ke kabid!',
            'suratKeluar' => $suratKeluar
        ];

        return response()->json($response,200);

    }

    public function search_dokumen(request $request)
    {
        $data = $request->input('search');
        $suratKeluar = SuratKeluar::where('dokumen','like',"%{$data}%")
            ->get();

        foreach ($suratKeluar as $key)
        {
            $key->viewSuratKeluarDetail = [
                'href' => 'api/v1/surat-keluar/' .$key->id,
                'url_doc' => url($key->url_dokumen),
                'method' => 'GET'
            ];

            $key->updateSuratKeluar = [
                'href' => 'api/v1/surat-keluar/' .$key->id,
                'params' => 'kepada,status,user_id,cek,disposisi,url_disposisi',
                'method' => 'POST'
            ];
        }
        $response = [
            'msg' => 'List Data Pencarian Data Surat Keluar Dari ' .$data,
            'suratKeluar' => $suratKeluar
        ];
        return response()->json($response,200);
    }

    public function updateSuratKeluar_langsung(Request $request,$id){
        $suratKeluar = SuratKeluar::findOrFail($id);
        if($suratKeluar->kepada != null){
            $response = [
                'msg' => 'Surat ini Sudah di teruskan!',
            ];
            return response()->json($response,200);

        }
        $this->validate($request, [
            'kepada' => 'required',
            'disposisi' => 'required',
            'disposisi.*' => 'file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $filename_disposisi = $request->disposisi->getClientOriginalName();
            $name_only_disposisi = pathinfo($filename_disposisi, PATHINFO_FILENAME);
            $ext_only_disposisi = $request->disposisi->getClientOriginalExtension();

            $name_file_disposisi = str_replace(" ", "-", strtolower($name_only_disposisi));
            $name_disposisi = $name_file_disposisi . '-' . date('His') . '.' . $ext_only_disposisi;
            $request->disposisi->storeAs('public/surat_keluar/disposisi', $name_disposisi);
            $path_disposisi = 'storage/surat_keluar/disposisi/' . $name_disposisi;
        }

        $kepada = $request->input('kepada');
        $splitKepada = explode(",",$kepada);
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
        $dataKepada = implode(",",$dataUser);

        $suratKeluar = SuratKeluar::findOrFail($id);
        $suratKeluar->kepada = $dataKepada;
        $suratKeluar->status = 'Disposisi ttd-Manual';
        $suratKeluar->disposisi = $name_disposisi;
        $suratKeluar->url_disposisi = $path_disposisi;
        $suratKeluar->save();
        foreach ($splitKepada as $key) {
            if($key == ""){

            }else{
                $newDisposisiKabid = new DisposisiKeluarKabid([
                    'user_id' => $key,
                    'surat_keluar_id' => $id,
                    'disposisi' => $name_disposisi,
                    'url_disposisi' => $path_disposisi
                ]);
                $newDisposisiKabid->save();
                //notif untuk kabid
            }
        }

        $suratDisposisiKabid = DisposisiKeluarKabid::where('surat_keluar_id','=',$id)->get();
        foreach ($suratDisposisiKabid as $key) {
            $key->viewDKKabidDetail = [
                'href' => 'api/v1/surat-keluar/disposisi/kabid/' .$key->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($key->url_disposisi)
            ];
        }
        $suratKeluar->viewDKKabid = [
            'href' => 'api/v1/surat-keluar-disposisi-kabid/' .$id ,
            'method' => 'GET',
            'suratKeluarDisposisiKabid' => $suratDisposisiKabid
        ];

        $suratKeluar->viewSemuaSuratKeluar = [
            'href' => 'api/v1/surat-keluar',
            'method' => 'GET'
        ];

        $response = [
            'msg' => 'Surat ' .$suratKeluar->indeks .' Berhasil di teruskan ke kabid!',
            'suratKeluar' => $suratKeluar
        ];

        return response()->json($response,200);

    }


    public function updateSuratKeluar_tolak(Request $request,$id){
        $suratKeluar = SuratKeluar::findOrFail($id);
        if($suratKeluar->kepada != null){
            $response = [
                'msg' => 'Surat ini Sudah di teruskan!',
            ];
            return response()->json($response,200);

        }
        $this->validate($request, [
            'kepada' => 'required',
            'disposisi' => 'required',
            'disposisi.*' => 'file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $filename_disposisi = $request->disposisi->getClientOriginalName();
            $name_only_disposisi = pathinfo($filename_disposisi, PATHINFO_FILENAME);
            $ext_only_disposisi = $request->disposisi->getClientOriginalExtension();

            $name_file_disposisi = str_replace(" ", "-", strtolower($name_only_disposisi));
            $name_disposisi = $name_file_disposisi . '-' . date('His') . '.' . $ext_only_disposisi;
            $request->disposisi->storeAs('public/surat_keluar/disposisi', $name_disposisi);
            $path_disposisi = 'storage/surat_keluar/disposisi/' . $name_disposisi;
        }

        $kepada = $request->input('kepada');
        $splitKepada = explode(",",$kepada);
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
        $dataKepada = implode(",",$dataUser);

        $suratKeluar = SuratKeluar::findOrFail($id);
        $suratKeluar->kepada = $dataKepada;
        $suratKeluar->status = 'Ditolak';
        $suratKeluar->disposisi = $name_disposisi;
        $suratKeluar->url_disposisi = $path_disposisi;
        $suratKeluar->save();
        foreach ($splitKepada as $key) {
            if($key == ""){

            }else{
                $newDisposisiKabid = new DisposisiKeluarKabid([
                    'user_id' => $key,
                    'surat_keluar_id' => $id,
                    'disposisi' => $name_disposisi,
                    'url_disposisi' => $path_disposisi
                ]);
                $newDisposisiKabid->save();
                //notif untuk kabid
            }
        }

        $suratDisposisiKabid = DisposisiKeluarKabid::where('surat_keluar_id','=',$id)->get();
        foreach ($suratDisposisiKabid as $key) {
            $key->viewDKKabidDetail = [
                'href' => 'api/v1/surat-keluar/disposisi/kabid/' .$key->id,
                'method' => 'GET',
                'url_doc_disposisi' => url($key->url_disposisi)
            ];
        }
        $suratKeluar->viewDKKabid = [
            'href' => 'api/v1/surat-keluar-disposisi-kabid/' .$id ,
            'method' => 'GET',
            'suratKeluarDisposisiKabid' => $suratDisposisiKabid
        ];

        $suratKeluar->viewSemuaSuratKeluar = [
            'href' => 'api/v1/surat-keluar',
            'method' => 'GET'
        ];

        $response = [
            'msg' => 'Surat ' .$suratKeluar->indeks .' Berhasil di teruskan ke kabid!',
            'suratKeluar' => $suratKeluar
        ];

        return response()->json($response,200);

    }
}
