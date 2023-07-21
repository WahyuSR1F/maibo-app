<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('organisasi_id');
            $table->unsignedBigInteger('jenis_event_id');
            $table->string('title');
            $table->text('deskripsi');
            $table->dateTime('registration_start');
            $table->dateTime('registration_close');
            $table->dateTime('event_start');
            $table->dateTime('event_close');
            $table->enum('status', ['ongoing', 'open', 'close', 'end']);
            $table->enum('status_view',['private','public']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
