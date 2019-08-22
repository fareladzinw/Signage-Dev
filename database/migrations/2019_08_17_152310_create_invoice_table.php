<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('user_id');
            $table->date('tanggal'); //tanggal jatuhtempo tidak dimasukan karena bisa ambil dari transaksi_id
            $table->integer('nominal');
            $table->integer('total');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user');
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
        Schema::dropIfExists('invoice');
    }
}
