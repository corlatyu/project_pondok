<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Milon\Barcode\Facades\DNS2DFacade;

class BarcodeController extends Controller
{
    public function generateQRCode()
    {
        $data = 'https://example.com'; // Data yang akan dimasukkan ke dalam QR Code
        $qrcode = DNS2DFacade::getBarcodeHTML($data, 'QRCODE');
        return view('barcode', compact('qrcode'));
    }
}
