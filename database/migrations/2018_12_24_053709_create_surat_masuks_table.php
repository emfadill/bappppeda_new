<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('indeks');
            $table->date('tgl_penyelesaian')->nullable();
            $table->string('dari');
            $table->string('perihal');
            $table->string('tgl_no_suratmasuk');
            $table->date('tgl_suratmasuk');
            $table->string('jenis_surat');
            $table->string('instruksi')->nullable();
            $table->string('kepada')->nullable();
            $table->string('status')->nullable();
            $table->string('dokumen');
            $table->string('url_dokumen',1000);
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
        Schema::dropIfExists('surat_masuks');
    }
}
