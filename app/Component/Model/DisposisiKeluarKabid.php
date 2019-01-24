<?php

namespace App\Component\Model;

use Illuminate\Database\Eloquent\Model;

class DisposisiKeluarKabid extends Model
{
    protected $fillable = [
        'user_id','surat_keluar_id','instruksi','kepada','disposisi','url_disposisi',
    ];

    public function get_user()
    {
        return $this->belongsTo('App\Component\Model\User','user_id','id');
    }
    public function get_surat()
    {
        return $this->belongsTo('App\Component\Model\SuratKeluar','surat_keluar_id','id');
    }

}
