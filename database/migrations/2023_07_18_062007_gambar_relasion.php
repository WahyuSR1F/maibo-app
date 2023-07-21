<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GambarRelasion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gambars', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('rekrutmen_id')->references('id')->on('rekrutmens');
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
