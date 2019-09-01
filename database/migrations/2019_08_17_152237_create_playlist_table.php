<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('media_id');
            $table->unsignedBigInteger('layout_id');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('paket_id');
            $table->integer('duration');
            $table->boolean('statusLoop');
            $table->boolean('statusMedia');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();

            $table->foreign('player_id')->references('id')->on('player');
            $table->foreign('media_id')->references('id')->on('media');
            $table->foreign('layout_id')->references('id')->on('layout');
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->foreign('paket_id')->references('id')->on('paket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlist');
    }
}
