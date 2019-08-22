<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('paket_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('pesanan_id')->nullable();
            $table->string('nama');
            $table->enum('type', ['JPG', 'PNG', 'MP4']);
            $table->integer('size');
            $table->integer('duration');
            $table->boolean('status');
            $table->string('url');
            $table->timestamps();

            $table->foreign('paket_id')->references('id')->on('paket');
            $table->foreign('pesanan_id')->references('id')->on('pesanan');
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
        Schema::dropIfExists('file');
    }
}
