<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buah;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data buah
        $dataBuah = Buah::latest()->get();

        // Hitung total buah per kategori kematangan
        $countByKematangan = Buah::select('kematangan')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('kematangan')
            ->get();

        // Bisa juga total harga atau rata-rata bobot
        $totalHarga = Buah::sum('harga');
        $rataRataBobot = Buah::avg('bobot');

        return view('dashboard.index', compact('dataBuah', 'countByKematangan', 'totalHarga', 'rataRataBobot'));
    }
}
