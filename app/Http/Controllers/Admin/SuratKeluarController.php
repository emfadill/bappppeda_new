<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Component\Model\SuratKeluar;
use Alert;
use Validator;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Message\Topics;
use FCM;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.surat-keluar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'indeks' => ['required'],
            'indeks.required' => ['indeks wajib diisi.'],
            'dari' => ['required'],
            'dari.required' => ['dari wajib diisi.'],
            'tujuan' => ['required'],
            'tujuan.required' => ['tujuan wajib diisi.'],
            'perihal' => ['required'],
            'perihal.required' => ['perihal wajib diisi.'],
            'tgl_no_surat' => ['required'],
            'tgl_no_surat.required' => ['tanggal no surat wajib diisi.'],
            'tgl_surat_keluar' => ['required'],
            'tgl_surat_keluar.required' => ['tanggal surat wajib diisi.'],
            'jenis_surat' => ['required'],
            'jenis_surat.required' => ['jenis surat wajib diisi.'],
            'file' => ['required'],
            'file.*' => ['file|mimes:pdf|max:2048'],
            'file.required' => ['file dokumen wajib diisi.']
        );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/suratkeluar')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            if ($request->hasFile('file')) {
                $filename = $request->file->getClientOriginalName();
                $name_only = pathinfo($filename, PATHINFO_FILENAME);
                $ext_only =  $request->file->getClientOriginalExtension();

                $name_file = str_replace(" ", "-", strtolower($name_only));
                $name =  $name_file.'-'.date('His').'.'.$ext_only;
                $request->file->storeAs('public/surat_keluar', $name);
                $path = 'storage/surat_keluar/' .$name;
                $newSuratKeluar = new SuratKeluar([
                    'indeks' => $request->get('indeks'),
                    'dari' => $request->get('dari'),
                    'tujuan' => $request->get('tujuan'),
                    'perihal' => $request->get('perihal'),
                    'tgl_no_suratkeluar' => $request->get('tgl_no_surat'),
                    'tgl_suratkeluar' => $request->get('tgl_surat_keluar'),
                    'jenis_surat' => $request->get('jenis_surat'),
                    'dokumen' => $name,
                    'url_dokumen' => $path,
                    'status' => 'Terkirim'
                ]);
                if ($newSuratKeluar->save()) {
                    Alert::success('Data Surat Keluar Berhasil ditambahkan', 'Berhasil ditambahkan!');
                    $notificationBuilder = new PayloadNotificationBuilder($request->get('jenis_surat').'-Surat Keluar dari Admin');
                    $notificationBuilder->setBody($name)
                        ->setSound('default');

                    $notification = $notificationBuilder->build();

                    $topic = new Topics();
                    $topic->topic('Kepala_Bappppeda');

                    $topicResponse = FCM::sendToTopic($topic, null, $notification, null);

                    $topicResponse->isSuccess();
                    $topicResponse->shouldRetry();
                    $topicResponse->error();
                    return redirect()->action('Admin\SuratKeluarController@index');
                } else {
                    Alert::error('Data Gagal Ditambah','Gagal Tambah Data!');
                    return back()->with('error_message', 'Gagal Tambah Data');
                }
                /*$data = User::create([
                   'nik' => $data['nik'],
                   'name' => $data['name'],
                   'username' => $data['username'],
                   'password' => Hash::make($data['password']),
                   'jabatan' => $data['jabatan'],
                   'level' => $data['level'],
               ]);

                   return back();*/
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
