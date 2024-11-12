<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inlogistic;
use App\Models\Logistic;
use App\Models\Outlogistic;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

class InlogisticController extends Controller
{
    public function index(Request $request)
    {
        $query = InLogistic::with('logistic', 'supplier');

        $month = $request->input('month');
        $year = $request->input('year');

        if ($month && $year) {
            $query->whereYear('tanggal_masuk', $year)
                ->whereMonth('tanggal_masuk', $month);
        } elseif ($year) {
            $query->whereYear('tanggal_masuk', $year);
        }

        $inlogistics = $query->latest()->paginate(15);

        $logistics = Logistic::with('inlogistics')->get();
        $suppliers = Supplier::all();

        $firstYearDate = InLogistic::min('tanggal_masuk');
        $firstYear = $firstYearDate ? date('Y', strtotime($firstYearDate)) : date('Y');
        $currentYear = date('Y');

        return view('inlogistics.index', [
            'inlogistics' => $inlogistics,
            'logistics' => $logistics,
            'suppliers' => $suppliers,
            'firstYear' => $firstYear,
            'currentYear' => $currentYear,
        ]);
    }

    public function export_inlogistic_pdf(Request $request)
    {
        $query = Inlogistic::with('logistic', 'supplier');

        $month = $request->input('month');
        $year = $request->input('year');

        if ($month && $year) {
            $query->whereYear('tanggal_masuk', $year)
                ->whereMonth('tanggal_masuk', $month);
        } elseif ($year) {
            $query->whereYear('tanggal_masuk', $year);
        }

        $inlogistics = $query->get();

        foreach ($inlogistics as $inlogistic) {
            $inlogistic->dokumentasi_masuk = $inlogistic->dokumentasi_masuk ? public_path('uploads/inlogistic/' . basename($inlogistic->dokumentasi_masuk)) : null;
            \Log::info('Jalur gambar: ' . $inlogistic->dokumentasi_masuk);
        }

        $pdf = PDF::loadView('pdf.export_inlogistic_pdf', ['inlogistics' => $inlogistics]);
        return $pdf->download('export_inlogistic_pdf.pdf');
    }

    public function export_show_inlogistic_pdf($id)
    {
        $inlogistic = Inlogistic::with('logistic', 'supplier')->findOrFail($id);

        // Ubah jalur gambar menjadi jalur absolut
        if ($inlogistic->dokumentasi_masuk) {
            $inlogistic->dokumentasi_masuk = public_path('uploads/inlogistic/' . basename($inlogistic->dokumentasi_masuk));
            \Log::info('Jalur gambar: ' . $inlogistic->dokumentasi_masuk);
        }

        $pdf = PDF::loadView('pdf.export_show_inlogistic_pdf', compact('inlogistic'));
        return $pdf->download('export_show_inlogistic.pdf');
    }

    public function create()
    {
        $logistics = Logistic::all();
        $suppliers = Supplier::all();
        return view('inlogistics.create', compact('logistics', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_logistik' => 'required|exists:logistics,id',
            'id_supplier' => 'required|exists:suppliers,id',
            'jumlah_logistik_masuk' => 'required|integer',
            'tanggal_masuk' => 'required|date',
            'expayer_logistik' => 'required|date',
            'keterangan_masuk' => 'required|string',
            'dokumentasi_masuk' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        $filename = NULL;
        $path = NULL;

        if ($request->has('dokumentasi_masuk')) {
            $file = $request->file('dokumentasi_masuk');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/inlogistic/';
            $file->move($path, $filename);
        }

        Inlogistic::create([
            'id_logistik' => $request->id_logistik,
            'id_supplier' => $request->id_supplier,
            'jumlah_logistik_masuk' => $request->jumlah_logistik_masuk,
            'tanggal_masuk' => $request->tanggal_masuk,
            'expayer_logistik' => $request->expayer_logistik,
            'keterangan_masuk' => $request->keterangan_masuk,
            'dokumentasi_masuk' => $path . $filename,
        ]);

        return redirect()->route('inlogistics.index')->with('success', 'Data berhasil ditambahkan !');
    }

    public function show(string $id)
    {
        $inlogistic = Inlogistic::findOrFail($id);
        $logistics = Logistic::all();
        return view('inlogistics.show', compact('inlogistic', 'logistics'));
    }

    public function edit(string $id)
    {
        $inlogistic = Inlogistic::findOrFail($id);
        $logistics = Logistic::all();
        $suppliers = Supplier::all();
        return view('inlogistics.edit', compact('inlogistic', 'logistics', 'suppliers'));
    }

    public function update(Request $request, string $id)
    {
        $inlogistic = Inlogistic::findOrFail($id);
        $inlogistic->update($request->all());
        return redirect()->route('inlogistics')->with('success', 'Data berhasil diubah !');
    }

    public function destroy($id)
    {
        $inlogistic = Inlogistic::findOrFail($id);
        if(File::exists($inlogistic->dokumentasi_masuk)){
            File::delete($inlogistic->dokumentasi_masuk);
        }

        $inlogistic->delete();

        $outlogistic = Outlogistic::where('id_inlogistik', $id)->first();
        if ($outlogistic) {
            $outlogistic->delete();
        }

        return redirect()->route('inlogistics.index')->with('success', 'Data berhasil dihapus !');
    }

}
