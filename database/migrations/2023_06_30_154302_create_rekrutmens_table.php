<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

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
            $table->id();
            $table->string('title');
            $table->string('deskirpsi');
            $table->foreignId('id_organisasi')->references('id')->on('organizations');
            $table->dateTime('exipred');
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
        Schema::dropIfExists('rekrutmens');
    }
}
