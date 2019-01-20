<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Component\Model\Jabatan;
use App\Component\Model\KepalaBidang;
use Validator;
use Alert;

class KabidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KepalaBidang::all();
        return view('admin.kabid.kabid',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kabid.add-kabid');
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
            'name' => ['required','unique:kepala_bidangs']            
        );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }
        else{
            $jabatan = Jabatan::where('name','=','Kepala Bidang')->first();
            // dd($jabatan->id);
            $kabid = new KepalaBidang([
                'jabatan_id' => $jabatan->id,
                'name' => $request->get('name')
            ]);
            if($kabid->save()){
            Alert::success('Data Berhasil ditambahkan','Berhasil ditambahkan!');
            return redirect()->action('Admin\KabidController@index');
        }else{
            return back()->with('error_message','Gagal Tambah Data');
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
        $data = KepalaBidang::findOrFail($id);
        return view('admin.kabid.edit-kabid',compact('data'));
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
        // dd($request->get('name'));
        $rules = array(
            'name' => ['required']            
        );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }
        else{
            $kabid = KepalaBidang::where('name',$request->get('name'))->first();
            if($kabid == null)
            {
                $kabid = KepalaBidang::findOrFail($id);
                $kabid->name = $request->get('name');
                if($kabid->save()){
                    Alert::success('Data Berhasil Diperbarui','Berhasil diPerbarui!');
                    return redirect()->action('Admin\KabidController@index');
                }else{
                    Alert::error('Data Gagal Diperbarui','Gagal Diperbarui!');
                    return back()->with('error_message','Gagal Tambah Data');
                }
            }else
            {
            Alert::error('Nama Kepala Bidang Sudah Ada','Gagal Diperbarui!');
            return back();
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $kabid = KepalaBidang::findOrFail($id);
       $kabid->delete();
        return response()->json(['success' => true]);
    }
}
