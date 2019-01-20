<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
           $table->increments('id');
            $table->string('nik')->unique();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->unsignedInteger('jabatan_id');
            $table->unsignedInteger('kabid_id')->nullable();
            $table->unsignedInteger('subid_id')->nullable();
            $table->foreign('jabatan_id')
                ->references('id')
                ->on('jabatans')
                ->onDelete('cascade');
            $table->foreign('kabid_id')
                ->references('id')
                ->on('kepala_bidangs')
                ->onDelete('cascade');
            $table->foreign('subid_id')
                ->references('id')
                ->on('sub_bidangs')
                ->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
