<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanCostumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan_costumers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idPesanPaket');
            $table->string('invoice');
            $table->string('nama');
            $table->string('email');
            $table->string('alamatLengkap');
            $table->text('infoTambah');
            $table->string('kodePos');
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
        Schema::dropIfExists('pesan_costumers');
    }
}
