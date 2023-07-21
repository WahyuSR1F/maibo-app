<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnggotaRelasion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anggotas', function (Blueprint $table) {
          
            
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas');
            $table->foreign('organisasi_id')->references('id')->on('organisasis');
            $table->foreign('devisi_id')->references('id')->on('divisis');
 
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
}
