<?php

namespace App\Http\Controllers\Admin;

use App\Component\Model\SuratKeluar;
use App\Component\Model\SuratMasuk;
use App\Component\Model\DisposisiMasukKabid;
use App\Component\Model\DisposisiKeluarKabid;
use App\Component\Model\DisposisiMasukSubid;
use App\Component\Model\DisposisiKeluarSubid;
use App\Component\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Response;
use Session;

//Includes WebClientPrint classes
//include_once(app_path() . '\WebClientPrint\WebClientPrint.php');
use Neodynamic\SDK\Web\WebClientPrint;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $wcppScript = WebClientPrint::createWcppDetectionScript(action('WebClientPrintController@processRequest'), Session::getId());
        $suratmasuk = SuratMasuk::latest()->get();
        $suratkeluar = SuratKeluar::latest()->get();
        // dd($suratmasuk);
        return view('admin.home', compact('suratmasuk','suratkeluar'));
        // return view('admin.home', compact('suratmasuk','suratkeluar'),['wcppScript' => $wcppScript]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function printPDF(){
        return view('admin.printPDF');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detaildm($id)
    {
        $suratmasuk = SuratMasuk::findOrFail($id);
        $DM = DisposisiMasukKabid::where('surat_masuk_id',$id)->get();
        return view('admin.dm.detailDMK',compact('suratmasuk','DM'));
    }

    public function detaildmsubid($id)
    {
        $DM = DisposisiMasukKabid::findOrFail($id);
        $suratmasuk = SuratMasuk::findOrFail($DM->surat_masuk_id);
        $DMS = DisposisiMasukSubid::where('diposisi_masuk_id',$id)->get();
        return view('admin.dm.detailDMS',compact('suratmasuk','DM','DMS'));
    }

     public function detaildk($id)
    {

        $suratkeluar = SuratKeluar::findOrFail($id);
        $DK = DisposisiKeluarKabid::where('surat_keluar_id',$id)->get();
        return view('admin.dk.detailDKK',compact('suratkeluar','DK'));
    }

    public function detaildksubid($id)
    {
        $DK = DisposisiKeluarKabid::findOrFail($id);
        $suratkeluar = SuratKeluar::findOrFail($DK->surat_keluar_id);
        $DKS = DisposisiKeluarSubid::where('diposisi_keluar_id',$id)->get();
        return view('admin.dk.detailDKS',compact('suratkeluar','DK','DKS'));
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
    public function view_pdf($id)
    {
        $suratmasuk = SuratMasuk::findOrFail($id);


            $pdf = PDF::loadView('admin.surat-masuk', ['view_pdf_masuk' => $suratmasuk->dokumen]);

        return $pdf->stream();
    }

    public function  view($id)
    {
        $suratmasuk = SuratMasuk::findOrFail($id);
        $filename = $suratmasuk->dokumen;
        $path = url($suratmasuk->url_dokumen);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }

    public function showTenderDocs($id)
    {
        $suratmasuk = SuratMasuk::findOrFail($id);
        dd(url($suratmasuk->url_dokumen));
        $filename = url($suratmasuk->url_dokumen);
        $path = url($suratmasuk->url_dokumen);
        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);

    }

}
