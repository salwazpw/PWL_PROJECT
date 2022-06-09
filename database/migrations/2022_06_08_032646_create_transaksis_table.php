<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservasi_id')->nullable();
            $table->foreign('reservasi_id')->references('id')->on('reservasis');
            $table->unsignedBigInteger('kamar_id')->nullable();
            $table->foreign('kamar_id')->references('id')->on('kamars');
            $table->unsignedBigInteger('pengunjung_id')->nullable();
            $table->foreign('pengunjung_id')->references('id')->on('pengunjungs');
            $table->date('tanggal_transaksi');
            $table->float('biaya_admin'); 
            $table->double('total_harga');
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
        Schema::dropIfExists('transaksis');
    }
}
