<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Component\Model\Jabatan;
use App\Component\Model\SubBidang;
use App\Component\Model\KepalaBidang;
use Validator;
use Alert;
class SubidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kabids = KepalaBidang::count();
        $jum = $kabids - 2;
        $kabid = KepalaBidang::skip(2)->take($jum)->get();
        $data = SubBidang::with('get_kabid','get_jabatan')->orderBy('kabid_id','asc')->get();
        return view('admin.subid.subid',compact('kabid','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kabids = KepalaBidang::count();
        $jum = $kabids - 2;
        $kabid = KepalaBidang::skip(2)->take($jum)->get();
        return view('admin.subid.add-subid',compact('kabid'));
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
            'kabid' => ['required'],
            'kabid.required' => ['Kepala Bidang wajib diisi.'],
            'name' => ['required','unique:sub_bidangs'],
            'name.required' => ['nama sub bidang wajib diisi.']            
        );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }
        else{
            $jabatan = Jabatan::where('name','=','Sub Bidang')->first();
            // dd($jabatan->id);
            $subid = new SubBidang([
                'jabatan_id' => $jabatan->id,
                'kabid_id' => $request->get('kabid'),
                'name' => $request->get('name')
            ]);
            if($subid->save()){
            Alert::success('Data Berhasil ditambahkan','Berhasil ditambahkan!');
            return redirect()->action('Admin\SubidController@index');
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
        $data = SubBidang::findOrFail($id);
        $kabids = KepalaBidang::count();
        $jum = $kabids - 2;
        $kabid = KepalaBidang::skip(2)->take($jum)
                ->whereNotIn('id', [$data->kabid_id])
                ->get();
        return view('admin.subid.edit-subid',compact('data','kabid'));
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
            'kabid' => ['required'],
            'name' => ['required']            
        );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }
        else{
            $subid = SubBidang::where('name',$request->get('name'))->first();
            if($subid == null)
            {
                $subid = SubBidang::findOrFail($id);
                $subid->kabid_id = $request->get('kabid');
                $subid->name = $request->get('name');
                if($subid->save()){
                    Alert::success('Data Berhasil Diperbarui','Berhasil diPerbarui!');
                    return redirect()->action('Admin\SubidController@index');
                }else{
                    Alert::error('Data Gagal Diperbarui','Gagal Diperbarui!');
                    return back()->with('error_message','Gagal Tambah Data');
                }
            }else
            {
            Alert::error('Nama Sub Bidang Sudah Ada','Gagal Diperbarui!');
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
        $kabid = SubBidang::findOrFail($id);
        $kabid->delete();
        return response()->json(['success' => true]);
    }
}
