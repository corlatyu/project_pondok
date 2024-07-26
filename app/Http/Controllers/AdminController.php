<?php

namespace App\Http\Controllers;

use App\Charts\KamarSantriChar;
use App\Charts\JenjangChar;
use App\Models\Santri;
use App\Models\Dispensasi;
use App\Models\Guru;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(KamarSantriChar $chart1, JenjangChar $chart2)
    {
        $chart1 = $chart1->build(); // Build KamarSantriChar chart
        $chart2 = $chart2->build(); // Build JenjangChar chart

        // Menghitung jumlah total santri
        $jumlahSantri = Santri::count();

        // Menghitung jumlah santri aktif
        $jumlahSantriAktif = Santri::where('status', 'aktif')->count();

        // Menghitung jumlah santri tidak aktif
        $jumlahSantriTidakAktif = Santri::where('status', 'tidak aktif')->count();

        // Menghitung jumlah santri izin
        $jumlahSantriIzin = Dispensasi::where('status', 'izin')->count();

        // Menghitung jumlah santri sakit
        $jumlahSantriSakit = Dispensasi::where('status', 'sakit')->count();

        // Menghitung jumlah santri yang Telat kembali
        $jumlahSantriTelat = Dispensasi::where('kembali_tanggal', '<', now())
            ->where('status', '!=', 'selesai')
            ->count();


        // Menghitung jumlah santri yang belum kembali
        $jumlahSantriBelumKembali = Dispensasi::whereIn('status', ['sakit', 'izin'])->count();


        // Menghitung jumlah guru
        $jumlahGuru = Guru::count();

        return view('dashboard.admin.index', compact(
            'jumlahSantri',
            'jumlahSantriAktif',
            'jumlahSantriTidakAktif',
            'jumlahSantriIzin',
            'jumlahSantriSakit',
            'jumlahSantriTelat',
            'jumlahGuru',
            'jumlahSantriBelumKembali',
            'chart1',
            'chart2'
        ));
    }
}
