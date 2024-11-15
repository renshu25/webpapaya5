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
            $table->string('nama');
            $table->string('varietas');
            $table->date('tanggal_penilain');
            $table->enum('kematangan', ['mentah', 'setengah matang', 'matang']);
            $table->string('featured_image')->nullable(); // Jalur untuk gambar yang diunggah
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buah');
    }
}