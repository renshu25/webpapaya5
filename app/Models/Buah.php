<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buah extends Model
{
    use HasFactory;

    // Nama tabel (kalau kamu pakai nama 'buah', ini wajib diset)
    protected $table = 'buah';

    // Kolom yang bisa diisi saat create/update
    protected $fillable = [
        'kode',
        'kematangan',
        'accuracy',
        'image',
        'tanggal_deteksi',
        'harga',
        'bobot'
    ];

    // Kalau kamu pakai timestamp bawaan Laravel, pastikan ini true
    public $timestamps = true;

    // Format tanggal deteksi (optional untuk casting otomatis)
    protected $casts = [
        'tanggal_deteksi' => 'datetime',
    ];
}
