<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('playlist_id');
            $table->date('tanggal');
            $table->boolean('status');
            $table->string('uniqueId');
            $table->integer('kapasitasFile');
            $table->integer('estimateTransfer');
            $table->timestamps();

            $table->foreign('player_id')->references('id')->on('player');
            $table->foreign('playlist_id')->references('id')->on('playlist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request');
    }
}
