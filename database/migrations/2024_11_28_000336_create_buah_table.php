<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuahTable extends Migration
{
    public function up()
    {
        Schema::create('buah', function (Blueprint $table) {
            $table->id();
            $table->string('kode'); // Kode buah
            $table->string('kematangan'); // Status kematangan
            $table->float('accuracy'); // Akurasi
            $table->string('image'); // URL atau path gambar
            $table->timestamp('tanggal_deteksi'); // Tanggal deteksi
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buah');
    }
}