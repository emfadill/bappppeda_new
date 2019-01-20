<?php

namespace App\Component\Model;

use Illuminate\Database\Eloquent\Model;

class DisposisiMasukSubid extends Model
{
    protected $fillable = [
        'user_id','diposisi_masuk_id','disposisi','url_disposisi',
    ];

    public function get_user()
    {
        return $this->belongsTo('App\Component\Model\User','user_id','id');
    }
    public function get_disposisi()
    {
        return $this->belongsTo('App\Component\Model\DisposisiMasukKabid','diposisi_masuk_id','id');
    }
}
