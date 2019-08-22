<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('paket_id');
            $table->unsignedBigInteger('playlist_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('status');
            $table->datetime('startTayang');
            $table->dateTime('endTayang');
            $table->string('numberFile');
            $table->enum('typeFile', ['lorem', 'ipsum', 'dolor']);
            $table->string('urlFile');
            $table->integer('orderFile');
            $table->timestamps();

            $table->foreign('transaksi_id')->references('id')->on('transaksi');
            $table->foreign('paket_id')->references('id')->on('paket');
            $table->foreign('playlist_id')->references('id')->on('playlist');
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content');
    }
}
