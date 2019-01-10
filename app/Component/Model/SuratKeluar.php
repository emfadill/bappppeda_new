<?php

namespace App\Component\Model;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $fillable = [
        'indeks','dari','tujuan','perihal','tgl_no_suratkeluar','tgl_suratkeluar','jenis_surat','instruksi','kepada','status','user_id','cek','dokumen','url_dokumen','dokumen_ttd','url_dokumen_ttd','disposisi','url_disposisi',
    ];

    public function get_user()
    {
        return $this->belongsTo('App\Component\Model\User','user_id','id');
    }
}
