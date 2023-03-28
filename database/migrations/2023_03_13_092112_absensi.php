<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('absensi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_event');
            $table->unsignedBigInteger('id_pengurus');
            $table->string('status');
            $table->foreign('id_event', 'event_absen_fk')->references('id')->on('event');
            $table->foreign('id_pengurus', 'pengurus_absen_fk')->references('id_pengurus')->on('pengurus');
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
