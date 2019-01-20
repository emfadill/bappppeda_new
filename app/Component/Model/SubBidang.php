<?php

namespace App\Component\Model;

use Illuminate\Database\Eloquent\Model;

class SubBidang extends Model
{
    protected $fillable = [
        'jabatan_id','kabid_id','name',
    ];

    public function get_jabatan()
    {
        return $this->belongsTo('App\Component\Model\Jabatan','jabatan_id','id');
    }
    public function get_kabid()
    {
        return $this->belongsTo('App\Component\Model\KepalaBidang','kabid_id','id');
    }
}
