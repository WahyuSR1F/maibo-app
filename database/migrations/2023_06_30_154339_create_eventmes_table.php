<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventmes', function (Blueprint $table) {
           $table->id();
           $table->foreignId('id_mahasiswa')->references('id')->on('mahasiswas');
           $table->foreignId('id_organization')->references('id')->on('organizations');
           $table->string('status_keanggotaan');
           $table->string('status');
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
        Schema::dropIfExists('eventmes');
    }
}
