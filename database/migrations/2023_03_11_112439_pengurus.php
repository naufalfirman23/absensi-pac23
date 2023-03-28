<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    
        Schema::create('pengurus', function (Blueprint $table) {
            $table->bigIncrements('id_pengurus');
            $table->unsignedBigInteger('id_jabatan');
            $table->unsignedBigInteger('id_ranting');
            $table->unsignedBigInteger('id_departemen');
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users', 'users_pengurus_fk')->references('id')->on('users');
            $table->foreign('id_jabatan', 'jabatan_pengurus_fk')->references('id')->on('jabatan');
            $table->foreign('id_ranting', 'ranting_pengurus_fk')->references('id')->on('ranting');
            $table->foreign('id_departemen', 'departemen_pengurus_fk')->references('id')->on('departemen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
