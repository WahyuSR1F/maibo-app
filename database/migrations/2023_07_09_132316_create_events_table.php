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
            $table->date('registration_start')->default(now()); // Ubah '2023-01-01' sesuai nilai default yang Anda inginkan
            $table->date('registration_close')->default(now());
            $table->date('event_start')->default(now());
            $table->date('event_close')->default(now());
            $table->enum('status', ['ongoing', 'open', 'close', 'end']);
            $table->enum('status_view',['private','public']);
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
        Schema::dropIfExists('events');
    }
}
