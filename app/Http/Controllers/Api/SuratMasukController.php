<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Component\Model\SuratMasuk;
use App\Component\Model\User;
use JWTAuth;
use JWTAuthException;
use Auth;

class SuratMasukController extends Controller
{
    public function viewSuratMasuk()
    {
        $suratMasuk = SuratMasuk::with('get_user')
                            ->orderBy('jenis_surat','ASC')
                            ->latest()
                            ->get();

        foreach ($suratMasuk as $key)
    {
        $key->viewSuratMasukDetail = [
            'href' => 'api/v1/surat-masuk/' .$key->id,
            'url_doc' => url($key->url_dokumen),
            'method' => 'GET'
        ];

        $key->updateSuratMasuk = [
            'href' => 'api/v1/surat-masuk/' .$key->id,
            'params' => 'kepada,status,user_id,cek,disposisi,url_disposisi',
            'method' => 'POST'
        ];
    }
        $response = [
          'msg' => 'List Data Surat Masuk',
          'suratMasuk' => $suratMasuk
        ];
        return response()->json($response,200);
    }

    public function viewSuratMasukSpesifik()
    {
        $idUser = Auth::User()->id;

        $suratMasuk = SuratMasuk::with('get_user')
                                ->whereHas('get_user',function ($query) use ($idUser){
                                    $query->whereIn('id',[$idUser]);
                                })
                                ->orderBy('jenis_surat','ASC')
                                ->latest()
                                ->get();

        foreach ($suratMasuk as $key)
        {
            $key->viewSuratMasukDetail = [
                'href' => 'api/v1/surat-masuk/' .$key->id,
                'url_doc' => url($key->url_dokumen),
                'method' => 'GET'
            ];

            $key->updateSuratMasuk = [
                'href' => 'api/v1/surat-masuk/' .$key->id,
                'params' => 'kepada,status,user_id,cek,disposisi,url_disposisi',
                'method' => 'POST'
            ];
        }
        $response = [
            'msg' => 'List Data Surat Masuk',
            'suratMasuk' => $suratMasuk
        ];
        return response()->json($response,200);
    }

    public function viewSuratMasukDetail($id)
    {
        $suratMasuk = SuratMasuk::with('get_user')->findOrFail($id);


        $suratMasuk->viewSemuaSuratMasuk = [
                'href' => 'api/v1/surat-masuk',
                'method' => 'GET'
            ];

        $suratMasuk->updateSuratMasuk = [
                'href' => 'api/v1/surat-masuk/' .$suratMasuk->id,
                'params' => 'kepada,status,user_id,cek,disposisi,url_disposisi',
                'method' => 'POST'
            ];

        $response = [
            'msg' => 'View Surat Masuk Detail Dari ' .$suratMasuk->indeks,
            'suratMasuk' => $suratMasuk
        ];
        return response()->json($response,200);
    }

    public function updateSuratMasuk(Request $request,$id){
        $this->validate($request, [
            'tgl_penyelesaian' => 'required',
            'kepada' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            'cek' => 'required',
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

        $suratMasuk = SuratMasuk::with('get_user')->findOrFail($id);
        $suratMasuk->tgl_penyelesaian = $request->input('tgl_penyelesaian');
        $suratMasuk->kepada = $request->input('kepada');
        $suratMasuk->status = $request->input('status');
        $suratMasuk->user_id = $request->input('user_id');
        $suratMasuk->cek = $request->input('cek');
        $suratMasuk->disposisi = $name;
        $suratMasuk->url_disposisi = $path;
        $suratMasuk->save();

        //notifikasi

        $suratMasuk->viewSuratMasukDetail = [
            'href' => 'api/v1/surat-masuk/' .$suratMasuk->id,
            'url_doc_disposisi' => url($suratMasuk->url_disposisi),
            'method' => 'GET'
        ];

        $suratMasuk->viewSemuaSuratMasuk = [
            'href' => 'api/v1/surat-masuk',
            'method' => 'GET'
        ];

        $response = [
            'msg' => 'Surat ' .$suratMasuk->indeks .' Berhasil di perbarui!',
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
        $suratMasuk = SuratMasuk::with('get_user')
            ->where('dokumen','like',"%{$data}%")
            ->get();

        foreach ($suratMasuk as $key)
        {
            $key->viewSuratMasukDetail = [
                'href' => 'api/v1/surat-masuk/' .$key->id,
                'url_doc' => url($key->url_dokumen),
                'method' => 'GET'
            ];

            $key->updateSuratMasuk = [
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
        $suratMasuk = SuratMasuk::with('get_user')
            ->whereHas('get_user',function ($query) use ($idUser){
                $query->whereIn('id',[$idUser]);
            })
            ->where('dokumen','like',"%{$data}%")
            ->get();

        foreach ($suratMasuk as $key)
        {
            $key->viewSuratMasukDetail = [
                'href' => 'api/v1/surat-masuk/' .$key->id,
                'url_doc' => url($key->url_dokumen),
                'method' => 'GET'
            ];

            $key->updateSuratMasuk = [
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

}
