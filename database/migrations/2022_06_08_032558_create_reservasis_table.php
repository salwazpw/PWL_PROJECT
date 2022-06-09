<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengunjung_id')->nullable();
            $table->foreign('pengunjung_id')->references('id')->on('pengunjungs');
            $table->unsignedBigInteger('kamar_id')->nullable();
            $table->foreign('kamar_id')->references('id')->on('kamars');
            $table->date('tanggal_booking');
            $table->string('tanggal_checkin');
            $table->string('tanggal_checkout');
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
        Schema::dropIfExists('reservasis');
    }
}
