<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DefaultRekrutmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rekrutmens', function (Blueprint $table) {
            $table->date('registration_start')->default(now())->change(); // Ubah '2023-01-01' sesuai nilai default yang Anda inginkan
            $table->date('registration_close')->default(now())->change();
            $table->date('event_start')->default(now())->change();
            $table->date('event_close')->default(now())->change();
        
        
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
