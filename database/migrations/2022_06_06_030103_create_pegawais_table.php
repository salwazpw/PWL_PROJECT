<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->string('nip', 10)->primary();
            $table->string('nama_pegawai');
            $table->string('foto_pegawai');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['P','L']);
            $table->date('tanggal_lahir');            
            $table->string('no_telp', 13);
            $table->enum('jabatan', ['Manager', 'Front Office', 'Housekeeping', 'Food Production', 'Sales & Marketing', 'Admin','Karyawan']);
            $table->double('gaji');
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
        Schema::dropIfExists('pegawais');
    }
}
