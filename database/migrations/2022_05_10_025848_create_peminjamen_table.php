<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->date('mulai');            
            $table->date('selesai');            
            $table->string('alasan_peminjaman');            
            $table->string('status');            
            $table->foreignId('kendaraan_id');   
            $table->foreignId('driver_id');   
            $table->foreignId('user_id');   
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
        Schema::dropIfExists('peminjamen');
    }
}
