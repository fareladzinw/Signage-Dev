<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('alamat');
            $table->BigInteger('hp');
            $table->enum('tipeClient', ['user', 'admin', 'master']);
            $table->string('username')->unique();
            $table->string('password');
            $table->dateTime('dateTime');
            $table->string('linkAfiliasi')->nullable();
            $table->integer('jumlahAfiliasi')->nullable();
            $table->string('namaBank')->nullable();
            $table->string('nomorRekening')->nullable();
            $table->string('namaRekening')->nullable();
            $table->string('foto')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
