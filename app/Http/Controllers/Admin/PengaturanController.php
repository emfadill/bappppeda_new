<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Component\Model\Jabatan;
use App\Component\Model\KepalaBidang;
use App\Component\Model\SubBidang;
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
        $jabatan = Jabatan::all();
        $kabid = KepalaBidang::all();
        return view('admin.add-akun',compact('jabatan','kabid'));
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
        $jabatan = Jabatan::all();
        $kabid = KepalaBidang::all();
        return view('admin.edit-akun', compact('data','jabatan','kabid'));
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
        );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          $pengguna = User::findOrFail($id);
            $jabatan = Jabatan::where('id','=',$request->get('jabatan'))->first();
            $kabid = KepalaBidang::where('id','=',$request->get('kabid'))->first();
            $subid = SubBidang::where('id','=',$request->get('subid'))->first();
        if($jabatan->name == 'Sub Bidang'){
            $rules = array(
                'kabid' => ['required'],
                'subid' => ['required'],
            );
            $message = array(
                'kabid.required' => 'Mohon Isi Kepala Bidang',
                'subid.required' => 'Mohon Isi Sub Bidang',
            );
        $validator = Validator::make ( $request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('/pengaturan-akun/add-akun')
                        ->withErrors($validator)
                        ->withInput();
        }else{
                $user = User::where('subid_id','=',$request->get('subid'))->get();
                if($user->isEmpty()){
                    $pengguna->name = $request->get('name');
                    $pengguna->username = $request->get('username');
                    $pengguna->nik = $request->get('nik');
                    $pengguna->jabatan_id = $request->get('jabatan');
                    $pengguna->kabid_id = $request->get('kabid');
                    $pengguna->subid_id = $request->get('subid');
                       
                 }else{
                  $user = User::where('subid_id','=',$request->get('subid'))->first();
                  if($user->id == $pengguna->id){
                    $pengguna->name = $request->get('name');
                    $pengguna->username = $request->get('username');
                    $pengguna->nik = $request->get('nik');
                    $pengguna->jabatan_id = $request->get('jabatan');
                    $pengguna->kabid_id = $request->get('kabid');
                    $pengguna->subid_id = $request->get('subid');
                       
                      }else{
                         Alert::error('Sub Bidang ' .$subid->name .' sudah ada','Gagal diperbarui!')->persistent("Close");
                         return back();
                      }
                   
                 }
             }
            }else if($jabatan->name == 'Kepala Bidang'){
                  $rules = array(
                    'kabid' => ['required'],
                );
                  $message = array(
                'kabid.required' => 'Mohon Isi Kepala Bidang',
            );
            $validator = Validator::make ( $request->all(), $rules,$message);
            if ($validator->fails()) {
                return redirect('/pengaturan-akun/add-akun')
                            ->withErrors($validator)
                            ->withInput();
            }else{
                $user = User::where('kabid_id','=',$request->get('kabid'))->get();
                if($user->isEmpty()){
                    $pengguna->name = $request->get('name');
                    $pengguna->username = $request->get('username');
                    $pengguna->nik = $request->get('nik');
                    $pengguna->jabatan_id = $request->get('jabatan');
                    $pengguna->kabid_id = $request->get('kabid');
                        
                }else{
                   $user = User::where('kabid_id','=',$request->get('kabid'))->first();
                  if($user->id == $pengguna->id){
                    $pengguna->name = $request->get('name');
                    $pengguna->username = $request->get('username');
                    $pengguna->nik = $request->get('nik');
                    $pengguna->jabatan_id = $request->get('jabatan');
                    $pengguna->kabid_id = $request->get('kabid');
                       
                      }else{
                         Alert::error('Kepala Bidang ' .$kabid->name .' sudah ada','Gagal diperbarui!')->persistent("Close");
                         return back();
                      }
                   
                }
            }
            }else{
                    $pengguna->name = $request->get('name');
                    $pengguna->username = $request->get('username');
                    $pengguna->nik = $request->get('nik');
                    $pengguna->jabatan_id = $request->get('jabatan');
                    $pengguna->kabid_id = $request->get('kabid');
                       
            }

            if($request->get('password') != null){
              $rules = array(
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            );
        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/pengaturan-akun/add-akun')
                        ->withErrors($validator)
                        ->withInput();
        }else{
          $pengguna->password = Hash::make($request['password']);
        }

            }

            if($pengguna->save()){
            Alert::success('Data Berhasil diupdate','Berhasil diubah!');
            return redirect()->action('Admin\PengaturanController@index');
        }else{
          Alert::error('Data gagal diubah', 'Oops!');
            return back()->with('error_message','Gagal Tambah Data');
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
        // dd($request->all());
        $rules = array(
            'name' => ['required', 'string'],
            'username' => ['required', 'string', 'unique:users'],
            'nik' => ['required','unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'jabatan' => ['required'],
        );

        $validator = Validator::make ( $request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/pengaturan-akun/add-akun')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $jabatan = Jabatan::where('id','=',$request->get('jabatan'))->first();
            $kabid = KepalaBidang::where('id','=',$request->get('kabid'))->first();
            $subid = SubBidang::where('id','=',$request->get('subid'))->first();
        if($jabatan->name == 'Sub Bidang'){
            $rules = array(
                'kabid' => ['required'],
                'subid' => ['required'],
            );
            $message = array(
                'kabid.required' => 'Mohon Isi Kepala Bidang',
                'subid.required' => 'Mohon Isi Sub Bidang',
            );
        $validator = Validator::make ( $request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('/pengaturan-akun/add-akun')
                        ->withErrors($validator)
                        ->withInput();
        }else{
                $user = User::where('subid_id','=',$request->get('subid'))->get();
                if($user->isEmpty()){

                $jabatan_kabid = Jabatan::where('name','=','Kepala Bidang')->first();
                $id_kabid = SubBidang::with('get_kabid')->findOrFail($request->get('subid'));
                  $checkKabid = User::where([
                                ['jabatan_id','=',$jabatan_kabid->id],
                                ['kabid_id','=',$id_kabid->get_kabid->id],
                                ])->get();
                  if($checkKabid->isEmpty()){
                    Alert::error('Kepala Bidang ' .$kabid->name.' belum ada tidak dapat menambahkan subid dari kabid yang belum ada','Gagal ditambahkan!')->persistent("Close");
                    return back()->withInput();;
                  }else{
                    $newUsers = new User([
                    'nik' => $request->get('nik'),
                    'name' => $request->get('name'),
                    'username' => $request->get('username'),
                    'password' => Hash::make($request['password']),
                    'jabatan_id' => $request->get('jabatan'),
                    'kabid_id' => $request->get('kabid'),
                    'subid_id' => $request->get('subid'),
                ]);
                  if($newUsers->save()){
                        Alert::success('Data Berhasil ditambahkan','Berhasil ditambahkan!');
                        return redirect()->action('Admin\PengaturanController@index');
                    }else{
                         Alert::error('Data Gagal ditambahkan','Gagal ditambahkan!');
                        return back();
                    }
                  }
                 
                 }else{
                    Alert::error('Sub Bidang ' .$subid->name .' sudah ada','Gagal ditambahkan!')->persistent("Close");
                    return back();
                 }
             }
            }else if($jabatan->name == 'Kepala Bidang'){
                  $rules = array(
                    'kabid' => ['required'],
                );
                  $message = array(
                'kabid.required' => 'Mohon Isi Kepala Bidang',
            );
            $validator = Validator::make ( $request->all(), $rules,$message);
            if ($validator->fails()) {
                return redirect('/pengaturan-akun/add-akun')
                            ->withErrors($validator)
                            ->withInput();
            }else{
                $user = User::where('kabid_id','=',$request->get('kabid'))->get();
                if($user->isEmpty()){
                    $newUsers = new User([
                        'nik' => $request->get('nik'),
                        'name' => $request->get('name'),
                        'username' => $request->get('username'),
                        'password' => Hash::make($request['password']),
                        'jabatan_id' => $request->get('jabatan'),
                        'kabid_id' => $request->get('kabid'),
                    ]);
                    if($newUsers->save()){
                        Alert::success('Data Berhasil ditambahkan','Berhasil ditambahkan!');
                        return redirect()->action('Admin\PengaturanController@index');
                    }else{
                         Alert::error('Data Gagal ditambahkan','Gagal ditambahkan!');
                        return back();
                    }
                }else{
                     Alert::error('Kepala Bidang ' .$kabid->name .' sudah ada!','Gagal ditambahkan!')->persistent("Close");
                    return back();
                }
            }
            }else{
                if($jabatan->name == 'Kepala Bappppeda'){
                    $user = User::where('jabatan_id','=',$jabatan->id)->get();
                    if($user->isEmpty()){
                        $newUsers = new User([
                    'nik' => $request->get('nik'),
                    'name' => $request->get('name'),
                    'username' => $request->get('username'),
                    'password' => Hash::make($request['password']),
                    'jabatan_id' => $request->get('jabatan'),
                ]);
                        if($newUsers->save()){
                        Alert::success('Data Berhasil ditambahkan','Berhasil ditambahkan!');
                        return redirect()->action('Admin\PengaturanController@index');
                    }else{
                         Alert::error('Data Gagal ditambahkan','Gagal ditambahkan!');
                        return back();
                    }
                    }else{
                        Alert::error('Kepala Bappppeda sudah ada!','Gagal ditambahkan!');
                        return back();
                    }
                }else{
                $newUsers = new User([
                    'nik' => $request->get('nik'),
                    'name' => $request->get('name'),
                    'username' => $request->get('username'),
                    'password' => Hash::make($request['password']),
                    'jabatan_id' => $request->get('jabatan'),
                ]);
                if($newUsers->save()){
                        Alert::success('Data Berhasil ditambahkan','Berhasil ditambahkan!');
                        return redirect()->action('Admin\PengaturanController@index');
                    }else{
                         Alert::error('Data Gagal ditambahkan','Gagal ditambahkan!');
                        return back();
                    }
                }

                 
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
public function kabid(){
      $jabatan_id = Input::get('jabatan_id');
      $kabid = Jabatan::where('name','=', 'Kepala Bidang')->first();
      $subid = Jabatan::where('name','=', 'Sub Bidang')->first();
      if($jabatan_id == $kabid->id){
        $subids = Jabatan::where('name','=','Sub Bidang')->first();
      $kabids = Jabatan::where('name','=','Kepala Bidang')->first();
      $kabid = $kabids->id;
      $data = KepalaBidang::join('users',function($join) use($kabid)
                {
                  $join->on('users.kabid_id','=','kepala_bidangs.id');
                  $join->where('users.jabatan_id','=',$kabid);
                })
                ->select('kepala_bidangs.id','kepala_bidangs.name')
                ->get();
            foreach ($data as $key ) {
                $kabid_id[] = $key->id;
              }
      $kabid = KepalaBidang::where('jabatan_id','=', 3)
                            ->whereNotIn('id',$kabid_id)
                            ->get(); 
      return response()->json($kabid);

      }else if($jabatan_id == $subid->id){
         $subids = Jabatan::where('name','=','Sub Bidang')->first();
      $kabids = Jabatan::where('name','=','Kepala Bidang')->first();
      $kabid = $kabids->id;
      $data = KepalaBidang::join('users',function($join) use($kabid)
                {
                  $join->on('users.kabid_id','=','kepala_bidangs.id');
                  $join->where('users.jabatan_id','=',$kabid);
                })
                ->select('kepala_bidangs.id','kepala_bidangs.name')
                ->get();
            foreach ($data as $key ) {
                $kabid_id[] = $key->id;
              }
        $kabid = KepalaBidang::where('jabatan_id','=', 3)
                            ->whereIn('id',$kabid_id)
                            ->get(); 
      return response()->json($kabid);
      }
    }
    public function subid(){
      $subids = Jabatan::where('name','=','Sub Bidang')->first();
      $kabids = Jabatan::where('name','=','Kepala Bidang')->first();
      $subid = $subids->id;
      $data = SubBidang::join('users',function($join) use($subid)
                {
                  $join->on('users.subid_id','=','sub_bidangs.id');
                  $join->where('users.jabatan_id','=',$subid);
                })
                ->select('sub_bidangs.id','sub_bidangs.name')
                ->get();
              foreach ($data as $key ) {
                $subid_id[] = $key->id;
              }
      $kabid_id = Input::get('kabid_id');
      $subid = SubBidang::where('kabid_id','=',$kabid_id)
                        ->whereNotIn('id',$subid_id)
                        ->get(); 
      return response()->json($subid);
    }
}
