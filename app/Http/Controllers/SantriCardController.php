<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SantriCardController extends Controller
{
    public function index()
    {
        $santris = Santri::all();
        return view('dashboard.admin.card.index', compact('santris'));
    }

    public function printCard($id)
    {
        $santri = Santri::findOrFail($id);
        return view('dashboard.admin.card.print', compact('santri'));
    }

    public function downloadPdf($id)
    {
        $santri = Santri::findOrFail($id);
        $pdf = PDF::loadView('dashboard.admin.card.cardpdf', compact('santri'));
        return $pdf->stream('card.pdf');
        
    }
}
