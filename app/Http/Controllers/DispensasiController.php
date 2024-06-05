<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Dispensasi;
use Illuminate\Http\Request;

class DispensasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dispensasi = Dispensasi::all();
        return view('dashboard.dispensasi.index', compact('dispensasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil hanya santri yang aktif dan belum memiliki izin atau sakit
        $santris = Santri::where('status', 'aktif')
                        ->whereNotIn('id', function ($query) {
                            $query->select('id_santri')
                                  ->from('dispensasi')
                                  ->whereIn('status', ['izin', 'sakit']);
                        })
                        ->get();
        return view('dashboard.dispensasi.create', compact('santris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_santri' => 'required|exists:santris,id',
            'pulang_tanggal' => 'required|date',
            'kembali_tanggal' => 'required|date',
            'status' => 'required|in:izin,sakit',
            'keterangan' => 'required|string',
            'no_telp' => 'required|numeric',
        ]);
    
        $santri = Santri::findOrFail($validatedData['id_santri']);
    
        Dispensasi::create([
            'id_santri' => $validatedData['id_santri'],
            'nama' => $santri->nama,
            'jenjang' => $santri->jenjang,
            'kamar' => $santri->kamar,
            'pulang_tanggal' => $validatedData['pulang_tanggal'],
            'kembali_tanggal' => $validatedData['kembali_tanggal'],
            'status' => $validatedData['status'],
            'keterangan' => $validatedData['keterangan'],
            'no_telp' => $validatedData['no_telp'],
        ]);
    
        return redirect()->route('dispensasi.index')->with('success', 'Data dispensasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dispensasi = Dispensasi::findOrFail($id);
        $dispensasi->delete();
    
        return redirect()->route('dispensasi.index')->with('success', 'Data dispensasi berhasil dihapus');
    }
    
}
