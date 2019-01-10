<?php

namespace App\Component\Model;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $fillable = [
        'indeks', 'tgl_penyelesaian', 'dari','perihal','tgl_no_suratmasuk','tgl_suratmasuk','jenis_surat','instruksi','kepada','status','user_id','cek','dokumen','url_dokumen','disposisi','url_disposisi',
    ];

    public function get_user()
    {
        return $this->belongsTo('App\Component\Model\User','user_id','id');
    }

}
