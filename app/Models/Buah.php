<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buah extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari konvensi
    protected $table = 'buah'; // Nama tabel yang sesuai

    // Jika Anda ingin menentukan kolom yang dapat diisi
    protected $fillable = ['kode', 'kematangan', 'accuracy', 'image', 'tanggal_deteksi'];
}