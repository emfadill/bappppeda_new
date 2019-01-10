<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Component\Model\SuratKeluar;
use App\Component\Model\User;
use JWTAuth;
use JWTAuthException;
use Auth;


class SuratKeluarController extends Controller
{
    public function viewSuratKeluar()
    {
        $suratKeluar = SuratKeluar::with('get_user')
                                    ->orderBy('jenis_surat','ASC')
                                    ->latest()
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
                'params' => 'kepada,status,user_id,cek,dokumen_ttd,disposisi',
                'method' => 'POST'
            ];
        }
        $response = [
            'msg' => 'List Data Surat Keluar',
            'suratKeluar' => $suratKeluar
        ];
        return response()->json($response,200);
    }

    public function viewSuratKeluarSpesifik()
    {
        $idUser = Auth::User()->id;

        $suratKeluar = SuratKeluar::with('get_user')
            ->whereHas('get_user',function ($query) use ($idUser){
                $query->whereIn('id',[$idUser]);
            })
            ->orderBy('jenis_surat','ASC')
            ->latest()
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
            'msg' => 'List Data Surat Keluar',
            'suratKeluar' => $suratKeluar
        ];
        return response()->json($response,200);
    }

    public function viewSuratKeluarDetail($id)
    {
        $suratKeluar = SuratKeluar::with('get_user')->findOrFail($id);


        $suratKeluar->viewSemuaSuratKeluar = [
            'href' => 'api/v1/surat-keluar',
            'method' => 'GET'
        ];

        $suratKeluar->updateSuratKeluar = [
            'href' => 'api/v1/surat-keluar/' .$suratKeluar->id,
            'params' => 'kepada,status,user_id,cek,dokumen_ttd,disposisi',
            'method' => 'POST'
        ];

        $response = [
            'msg' => 'View Surat Keluar Detail Dari ' .$suratKeluar->indeks,
            'suratKeluar' => $suratKeluar
        ];
        return response()->json($response,200);
    }

    public function updateSuratKeluar(Request $request,$id){
        $this->validate($request, [
            'kepada' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            'file' => 'required',
            'file.*' => 'file|mimes:pdf|max:2048',
            'cek' => 'required',
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

        $suratKeluar = SuratKeluar::with('get_user')->findOrFail($id);
        $suratKeluar->kepada = $request->input('kepada');
        $suratKeluar->status = $request->input('status');
        $suratKeluar->user_id = $request->input('user_id');
        $suratKeluar->dokumen_ttd = $name;
        $suratKeluar->url_dokumen_ttd = $path;
        $suratKeluar->cek = $request->input('cek');
        $suratKeluar->disposisi = $name_disposisi;
        $suratKeluar->url_disposisi = $path_disposisi;
        $suratKeluar->save();

        $suratKeluar->viewSuratKeluarDetail = [
            'href' => 'api/v1/surat-keluar/' .$suratKeluar->id,
            'url_doc_ttd' => url($suratKeluar->url_dokumen_ttd),
            'url_doc_disposisi' => url($suratKeluar->url_disposisi),
            'method' => 'GET'
        ];

        $suratKeluar->viewSemuaSuratKeluar = [
            'href' => 'api/v1/surat-keluar',
            'method' => 'GET'
        ];

        $response = [
            'msg' => 'Surat ' .$suratKeluar->indeks .' Berhasil di perbarui!',
            'suratKeluar' => $suratKeluar
        ];

        return response()->json($response,200);

    }

    public function search_dokumen(request $request)
    {
        $data = $request->input('search');
        $suratKeluar = SuratKeluar::with('get_user')
            ->where('dokumen','like',"%{$data}%")
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

}
