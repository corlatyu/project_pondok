<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Dispensasi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exports\DispensasiExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class DispensasiController extends Controller
{
    public function index()
    {
        $dispensasi = Dispensasi::with('santri')->get();
        return view('dashboard.admin.dispensasi.index', compact('dispensasi'));
    }

    public function downloadPdf($id)
    {
        $dispensasi = Dispensasi::with('santri')->findOrFail($id);
        $pdf = PDF::loadView('dashboard.admin.dispensasi.pdf', compact('dispensasi'));
        return $pdf->download('izin.pdf');
        
    }

    public function create()
    {
        $santris = Santri::where('status', 'aktif')
                        ->whereDoesntHave('dispensasi', function ($query) {
                            $query->whereIn('status', ['izin', 'sakit'])
                                  ->whereNull('deleted_at');
                        })
                        ->get();
        
        if ($santris->isEmpty()) {
            return redirect()->route('dispensasi.index')->with('error', 'Tidak ada santri yang tersedia untuk diberi dispensasi.');
        }
        
        return view('dashboard.admin.dispensasi.create', compact('santris'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'id_santri' => 'required|exists:santris,id',
            'pulang_tanggal' => 'required|date',
            'kembali_tanggal' => 'required|date|after:pulang_tanggal',
            'status' => 'required|string',
            'keterangan' => 'nullable|string',
            'no_telp' => 'nullable|string',
        ]);
    
        // Ambil data santri berdasarkan id_santri
        $santri = Santri::find($request->id_santri);
    
        // Buat record baru di tabel dispensasi
        Dispensasi::create([
            'id_santri' => $santri->id,
            'nama' => $santri->nama,
            'jenjang' => $santri->jenjang,
            'kamar' => $santri->kamar,
            'pulang_tanggal' => $validated['pulang_tanggal'],
            'kembali_tanggal' => $validated['kembali_tanggal'],
            'status' => $validated['status'],
            'keterangan' => $validated['keterangan'],
            'no_telp' => $validated['no_telp'],
        ]);
    
        // Redirect atau lakukan tindakan lain setelah penyimpanan
        return redirect()->route('dispensasi.index')->with('success', 'Dispensasi berhasil ditambahkan.');
    }
    

    public function edit(Dispensasi $dispensasi)
{
    return view('dashboard.admin.dispensasi.edit', compact('dispensasi'));
}

public function update(Request $request, Dispensasi $dispensasi)
{
    $validatedData = $request->validate([
        'status' => 'required|in:izin,sakit,selesai',
        'kembali_tanggal' => 'required|date',
        'keterangan' => 'required|string',
    ]);

    $dispensasi->update($validatedData);

    return redirect()->route('dispensasi.index')->with('success', 'Data dispensasi berhasil diperbarui');
}

public function show(Dispensasi $dispensasi)
{
    return view('dashboard.admin.dispensasi.show', compact('dispensasi'));
}
    public function destroy($id)
    {
        $dispensasi = Dispensasi::findOrFail($id);
        $dispensasi->delete();
    
        return redirect()->route('dispensasi.index')->with('success', 'Data dispensasi berhasil dihapus');
    }

    public function print($id)
    {
        $dispensasi = Dispensasi::with('santri')->findOrFail($id);
        return view('dashboard.admin.dispensasi.print', compact('dispensasi'));
    }

    public function terlambat()
{
    $terlambat = Dispensasi::where('kembali_tanggal', '<', now())
                           ->where('status', '!=', 'selesai')
                           ->with('santri')
                           ->get();

    return view('dashboard.admin.dispensasi.terlambat', compact('terlambat'));
}

public function kembali($id)
{
    $dispensasi = Dispensasi::findOrFail($id);
    $dispensasi->status = 'selesai';
    $dispensasi->save();

    return redirect()->route('dispensasi.index')->with('success', 'Status santri berhasil diperbarui menjadi kembali.');
}


public function export(Request $request)
{
    $filterType = $request->input('filter_type');
    $exportTypes = $request->input('export_type', []);

    if (empty($exportTypes)) {
        return redirect()->back()->with('error', 'Pilih setidaknya satu jenis data untuk diekspor.');
    }

    switch ($filterType) {
        case 'day':
            $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
            $endDate = Carbon::parse($request->input('end_date'))->endOfDay();
            if (!$startDate || !$endDate) {
                return redirect()->back()->with('error', 'Harap masukkan tanggal awal dan akhir.');
            }
            break;
        case 'month':
            $month = $request->input('month');
            if (!$month) {
                return redirect()->back()->with('error', 'Harap pilih bulan.');
            }
            $startDate = Carbon::createFromFormat('Y-m', $month)->startOfMonth();
            $endDate = Carbon::createFromFormat('Y-m', $month)->endOfMonth();
            break;
        case 'year':
            $year = $request->input('year');
            if (!$year) {
                return redirect()->back()->with('error', 'Harap masukkan tahun.');
            }
            $startDate = Carbon::createFromDate($year, 1, 1)->startOfYear();
            $endDate = Carbon::createFromDate($year, 12, 31)->endOfYear();
            break;
        default:
            return redirect()->back()->with('error', 'Filter tidak valid.');
    }

    $fileName = 'dispensasi_' . $startDate->format('Y-m-d') . '_to_' . $endDate->format('Y-m-d') . '.xlsx';

    return Excel::download(new DispensasiExport($startDate, $endDate, $filterType, $exportTypes), $fileName);
}
}