<?php

namespace App\Component\Model;

use Illuminate\Database\Eloquent\Model;

class DisposisiKeluarSubid extends Model
{
    protected $fillable = [
        'user_id','diposisi_keluar_id','disposisi','url_disposisi',
    ];

    public function get_user()
    {
        return $this->belongsTo('App\Component\Model\User','user_id','id');
    }
    public function get_disposisi()
    {
        return $this->belongsTo('App\Component\Model\DisposisiKeluarKabid','diposisi_keluar_id','id');
    }
}
