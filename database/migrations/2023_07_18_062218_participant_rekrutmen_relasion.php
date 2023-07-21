<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ParticipantRekrutmenRelasion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participants_rekrutmens', function (Blueprint $table) {
            $table->foreign('rekrutmen_id')->references('id')->on('rekrutmens');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas');
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
