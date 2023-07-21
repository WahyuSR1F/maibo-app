<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekrutmensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekrutmens', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('organisasi_id');
            $table->string('title');
            $table->string('deskripsi');
            $table->dateTime('registration_start');
            $table->dateTime('registration_close');
            $table->dateTime('event_start');
            $table->dateTime('event_close');
            $table->enum('status',['ongoin','open', 'close','end']);
            
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
        Schema::dropIfExists('rekrutmens');
    }
}
