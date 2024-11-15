<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianKematanganTable extends Migration
{
    public function up()
    {
        Schema::create('penilaian_kematangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buah_id')->constrained('buah')->onDelete('cascade');
            $table->date('tanggal_penilaian');
            $table->integer('skor');
            $table->float('accuracy');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penilaian_kematangan');
    }
}