<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('organisasi_id');
            $table->unsignedBigInteger('devisi_id');
            $table->enum('status_pangkat',['ketua','wakil','sekretaris','bendahara','CO devisi','anggota']);
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
        Schema::dropIfExists('anggotas');
    }
}
