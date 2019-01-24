<?php

namespace App\Component\Model;

use Illuminate\Database\Eloquent\Model;

class DisposisiMasukKabid extends Model
{
    protected $fillable = [
        'user_id','surat_masuk_id','instruksi','kepada','disposisi','url_disposisi',
    ];

    public function get_user()
    {
        return $this->belongsTo('App\Component\Model\User','user_id','id');
    }
    public function get_surat()
    {
        return $this->belongsTo('App\Component\Model\SuratMasuk','surat_masuk_id','id');
    }
}
