<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Dispensasi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Menghitung jumlah total santri
        $jumlahSantri = Santri::count();

        // Menghitung jumlah santri aktif
        $jumlahSantriAktif = Santri::where('status', 'aktif')->count();

        // Menghitung jumlah santri tidak aktif
        $jumlahSantriTidakAktif = Santri::where('status', 'tidak aktif')->count();

                // Menghitung jumlah santri pulang
                $jumlahSantriIzin = Dispensasi::where('status', 'izin')->count();

                // Menghitung jumlah santri sakit
                $jumlahSantriSakit = Dispensasi::where('status', 'sakit')->count();

        // Menghitung jumlah santri berdasarkan kamar
        $kamarCounts = Santri::select('kamar', \DB::raw('count(*) as total'))
            ->groupBy('kamar')
            ->pluck('total', 'kamar')
            ->toArray();

        return view('dashboard.admin.index', compact('jumlahSantri', 'jumlahSantriAktif', 'jumlahSantriTidakAktif', 'kamarCounts', 'jumlahSantriIzin', 'jumlahSantriSakit'));
    }
}
