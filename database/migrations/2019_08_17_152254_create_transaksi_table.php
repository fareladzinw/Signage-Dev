<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('paket_id');
            $table->integer('jumlahPesanan');
            $table->date('tanggal');
            $table->integer('nominal');
            $table->integer('discount');
            $table->integer('total');
            $table->boolean('statusUpload');
            $table->boolean('statusTayang');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('transaksi');
    }
}
