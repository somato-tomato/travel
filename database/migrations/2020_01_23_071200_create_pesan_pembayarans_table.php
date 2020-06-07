<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan_pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idPesanPaket');
            $table->string('invoice');
            $table->string('bayar');
            $table->string('buktiTransfer');
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
        Schema::dropIfExists('pesan_pembayarans');
    }
}
