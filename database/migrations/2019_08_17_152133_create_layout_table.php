<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
    */
    public function up()
    {
        Schema::create('layout', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->integer('width');
            $table->integer('height');
            $table->boolean('statusFullscreen');
            $table->enum('orientation', ['landscape', 'potrait']);
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
        Schema::dropIfExists('layout');
    }
}
