<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Component\Model\Jabatan;
use App\Component\Model\SubBidang;
use App\Component\Model\KepalaBidang;
use App\Component\Model\User;
use Validator;
use JWTAuth;
use JWTAuthException;
use Auth;
class KonfigurasiController extends Controller
{
    public function kabid()
    {
    	$subids = Jabatan::where('name','=','Sub Bidang')->first();
        $kabids = Jabatan::where('name','=','Kepala Bidang')->first();
        $sekretariss = Jabatan::where('name','=','Sekretaris')->first();
        $sekretaris = $sekretariss->id;
    	$kabid = $kabids->id;
        $user = User::with('get_jabatan')->where('jabatan_id','=',$sekretaris)->first();
    	$data = KepalaBidang::join('users',function($join) use($kabid)
    						{
    							$join->on('users.kabid_id','=','kepala_bidangs.id');
    							$join->where('users.jabatan_id','=',$kabid);
    						})
    						->select('users.id','kepala_bidangs.name')
    						->get();
        $Sekretaris = [
            'id' => $user->id,
            'name' => $user->get_jabatan->name
        ];
    	$response = [
            'msg' => 'List Data Kabid',
            'Data_Kabid' => $data,
            'Sekretaris' => $Sekretaris
        ];
        return response()->json($response,200);
    }

    public function subid()
    {
    	$subids = Jabatan::where('name','=','Sub Bidang')->first();
    	$kabids = Jabatan::where('name','=','Kepala Bidang')->first();
    	$subid = $subids->id;
    	$data = SubBidang::join('users',function($join) use($subid)
    						{
    							$join->on('users.subid_id','=','sub_bidangs.id');
    							$join->where('users.jabatan_id','=',$subid);
    						})
    						->where('sub_bidangs.kabid_id','=',Auth::User()->kabid_id)
    						->select('users.id','sub_bidangs.name')
    						->get();
    	$response = [
            'msg' => 'List Data Subid',
            'Data_Subid' => $data
        ];
        return response()->json($response,200);
    }
}
