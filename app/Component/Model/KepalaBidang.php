<?php

namespace App\Component\Model;

use Illuminate\Database\Eloquent\Model;

class KepalaBidang extends Model
{
    protected $fillable = [
        'jabatan_id','name',
    ];

    public function get_jabatan()
    {
        return $this->belongsTo('App\Component\Model\Jabatan','jabatan_id','id');
    }
}
