<?php

namespace App\Component\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'nik', 'name', 'username','password','jabatan_id','kabid_id','subid_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function get_jabatan()
    {
        return $this->belongsTo('App\Component\Model\Jabatan','jabatan_id','id');
    }
    public function get_kabid()
    {
        return $this->belongsTo('App\Component\Model\KepalaBidang','kabid_id','id');
    }
    public function get_subid()
    {
        return $this->belongsTo('App\Component\Model\SubBidang','subid_id','id');
    }
}
