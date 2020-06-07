<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanPaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan_pakets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice');
            $table->bigInteger('idPaket');
            $table->date('tanggal');
            $table->integer('jumlahDewasa');
            $table->integer('jumlahAnak');
            $table->bigInteger('idMobil');
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
        Schema::dropIfExists('pesan_pakets');
    }
}
