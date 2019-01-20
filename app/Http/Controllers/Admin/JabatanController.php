<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Component\Model\Jabatan;
use Validator;
use Alert;


class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jabatan::all();
        return view('admin.jabatan.jabatan',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jabatan.add-jabatan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = array(
            'name' => ['required','unique:jabatans']            
        );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }
        else{
            $jabatan = new Jabatan([
                'name' => $request->get('name')
            ]);
            if($jabatan->save()){
            Alert::success('Data Berhasil ditambahkan','Berhasil ditambahkan!');
            return redirect()->action('Admin\JabatanController@index');
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
        $data = Jabatan::findOrFail($id);
        return view('admin.jabatan.edit-jabatan',compact('data'));
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
        // dd($request->all());
        $rules = array(
            'name' => ['required']            
        );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }
        else{
            $jabatan = Jabatan::where('name',$request->get('name'))->first();
            if($jabatan == null)
            {
                $jabatan = Jabatan::findOrFail($id);
                $jabatan->name = $request->get('name');
                if($jabatan->save()){
                    Alert::success('Data Berhasil Diperbarui','Berhasil diPerbarui!');
                    return redirect()->action('Admin\JabatanController@index');
                }else{
                    Alert::error('Data Gagal Diperbarui','Gagal Diperbarui!');
                    return back()->with('error_message','Gagal Tambah Data');
                }
            }else
            {
            Alert::error('Nama Jabatan Sudah Ada','Gagal Diperbarui!');
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
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();
        return response()->json(['success' => true]);
    }
}
