<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsRekrutmensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants_rekrutmens', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('rekrutmen_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('devisi_id');
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
        Schema::dropIfExists('participants_rekrutmens');
    }
}
