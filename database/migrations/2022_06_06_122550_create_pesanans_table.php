<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kamar_id')->nullable();
            $table->foreign('kamar_id')->references('id')->on('kamars');
            $table->unsignedBigInteger('makanan_id')->nullable();
            $table->foreign('makanan_id')->references('id')->on('makanans');
            $table->unsignedBigInteger('minuman_id')->nullable();
            $table->foreign('minuman_id')->references('id')->on('minumen');
            $table->integer('jumlah_makanan');
            $table->integer('jumlah_minuman');
            $table->float('total_harga');
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
        Schema::dropIfExists('pesanans');
    }

}
