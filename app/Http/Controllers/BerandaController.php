<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Santri;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BerandaController extends Controller
{

    public function index()
    {

        // Menghitung jumlah total santri
        $jumlahSantriBeranda = Santri::count();
        $jumlahSantriAktifBeranda = Santri::where('status', 'aktif')->count();
        $jumlahSantriAlumni = Santri::where('status', 'tidak aktif')->count();
                // Menghitung jumlah guru
                $jumlahGuru = Guru::count();

        return view('home', compact(
            'jumlahSantriBeranda',
            'jumlahSantriAktifBeranda',
            'jumlahSantriAlumni',
            'jumlahGuru'

        ));
    }
    public function generatePDF()
    {
        $pdf = PDF::loadView('beranda.profilepondok');
        return $pdf->stream('profil_pondok_pesantren_al_akhyar.pdf');
    }}
