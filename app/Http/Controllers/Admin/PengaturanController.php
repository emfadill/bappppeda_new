<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Component\Model\User;
use Alert;
use Validator;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = User::all();
        return view('admin.pengaturan-akun', compact('akun'));
    }

    public function addakun()
    {
        return view('admin.add-akun');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $data = User::findOrFail($id);
        return view('admin.edit-akun', compact('data'));
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
        $rules = array(
            'name' => ['required', 'string'],
            'username' => ['required', 'string'],
            'nik' => ['required'],
            'jabatan' => ['required'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'level' => ['required'],
        );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin.edit-akun')
                        ->withErrors($validator)
                        ->withInput();
        }else{


        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->nik = $request->get('nik');
        $user->jabatan = $request->get('jabatan');
        $user->password = Hash::make($request['password']);
        $user->level = $request->get('level');
            if($user->save()){
                Alert::success('Data Berhasil diupdate','Berhasil diubah!');
            return redirect()->action('Admin\PengaturanController@index');
            }else{
            return back();
            Alert::error('Data gagal diubah', 'Oops!');
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
        $data = User::findOrFail($id);
        $data->delete();

        return response()->json(['success' => true]);
    }

    public function create_akun(request $request)
    {
        $rules = array(
            'name' => ['required', 'string'],
            'username' => ['required', 'string', 'unique:users'],
            'nik' => ['required'],
            'jabatan' => ['required'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'level' => ['required'],
        );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/pengaturan-akun/add-akun')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
        $newUsers = new User([
            'nik' => $request->get('nik'),
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'password' => Hash::make($request['password']),
            'jabatan' => $request->get('jabatan'),
            'level' => $request->get('level'),
        ]);
        if($newUsers->save()){
            Alert::success('Data Berhasil ditambahkan','Berhasil ditambahkan!');
            return redirect()->action('Admin\PengaturanController@index');
        }else{
            return back()->with('error_message','Gagal Tambah Data');
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
