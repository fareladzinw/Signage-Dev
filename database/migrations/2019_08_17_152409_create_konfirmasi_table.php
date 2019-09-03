<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonfirmasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaksi_id');
            $table->enum('type', ['lorem', 'ipsum', 'dolor'])->nullable();
            $table->string('konfirmasiDari')->nullable();
            $table->date('tanggal');
            $table->string('namaBank');
            $table->string('namaRekening');
            $table->integer('nominal');
            $table->boolean('status');
            $table->boolean('validasi');
            $table->string('dataBulb')->nullable();
            $table->timestamps();

            $table->foreign('transaksi_id')->references('id')->on('transaksi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konfirmasi');
    }
}
