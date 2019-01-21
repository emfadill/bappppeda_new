<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKepalaBidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepala_bidangs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('jabatan_id');
            $table->string('name');
             $table->foreign('jabatan_id')
                ->references('id')
                ->on('jabatans')
                ->onDelete('cascade');
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
        Schema::dropIfExists('kepala_bidangs');
    }
}
