<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('indeks');
            $table->string('dari');
            $table->string('tujuan');
            $table->string('perihal');
            $table->string('tgl_no_suratkeluar');
            $table->date('tgl_suratkeluar');
            $table->string('jenis_surat');
            $table->string('instruksi')->nullable();
            $table->string('kepada')->nullable();
            $table->string('status')->nullable();
            $table->string('dokumen');
            $table->string('url_dokumen',1000);
            $table->string('dokumen_ttd')->nullable();
            $table->string('url_dokumen_ttd',1000)->nullable();
            $table->string('disposisi')->nullable();
            $table->string('url_disposisi',1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_keluars');
    }
}
