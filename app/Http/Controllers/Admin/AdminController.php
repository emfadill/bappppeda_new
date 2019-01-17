<?php

namespace App\Http\Controllers\Admin;

use App\Component\Model\SuratKeluar;
use App\Component\Model\SuratMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Response;
use Session;

//Includes WebClientPrint classes
include_once(app_path() . '\WebClientPrint\WebClientPrint.php');
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
        $wcppScript = WebClientPrint::createWcppDetectionScript(action('WebClientPrintController@processRequest'), Session::getId());
        $suratmasuk = SuratMasuk::with('get_user')
            ->orderBy('jenis_surat','ASC')
            ->latest()
            ->get();
        $suratkeluar = SuratKeluar::with('get_user')
            ->orderBy('jenis_surat','ASC')
            ->latest()
            ->get();
        return view('admin.home', compact('suratmasuk','suratkeluar'),['wcppScript' => $wcppScript]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function printPDF(){
        return view('home.printPDF');
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
    public function view_pdf($id)
    {
        $suratmasuk = SuratMasuk::with('get_user')->findOrFail($id);


            $pdf = PDF::loadView('admin.surat-masuk', ['view_pdf_masuk' => $suratmasuk->dokumen]);

        return $pdf->stream();
    }

    public function  view($id)
    {
        $suratmasuk = SuratMasuk::with('get_user')->findOrFail($id);
        $filename = $suratmasuk->dokumen;
        $path = url($suratmasuk->url_dokumen);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }

    public function showTenderDocs($id)
    {
        $suratmasuk = SuratMasuk::with('get_user')->findOrFail($id);
        dd(url($suratmasuk->url_dokumen));
        $filename = url($suratmasuk->url_dokumen);
        $path = url($suratmasuk->url_dokumen);
        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);

    }

}
