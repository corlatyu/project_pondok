<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(): View
{
    // Mengambil hanya 10 data santri per halaman
    $santri = Santri::paginate(5);

    return view('dashboard.santri.index', compact('santri'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.santri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_santri' => 'required|size:6',
            'nama' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nik' => 'required|size:16',
            'jenis_kelamin' => 'required',
            'kamar' => 'required',
            'jenjang' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'nomer_telp_orangtua' => 'required',
            'no_kk' => 'required|size:16',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->storeAs('public/foto_santri', $imageName);

        Santri::create([
            'id_santri' => $validatedData['id_santri'],
            'nama' => $validatedData['nama'],
            'image' => $imageName,
            'nik' => $validatedData['nik'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'kamar' => $validatedData['kamar'],
            'jenjang' => $validatedData['jenjang'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'alamat' => $validatedData['alamat'],
            'provinsi' => $validatedData['provinsi'],
            'kabupaten' => $validatedData['kabupaten'],
            'nama_ayah' => $validatedData['nama_ayah'],
            'nama_ibu' => $validatedData['nama_ibu'],
            'nomer_telp_orangtua' => $validatedData['nomer_telp_orangtua'],
            'no_kk' => $validatedData['no_kk'],
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('santri.index')->with('success', 'Data Santri berhasil disimpan!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $santri = Santri::findOrFail($id);
        return view('dashboard.santri.show', compact('santri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $santri = Santri::findOrFail($id);
        return view('dashboard.santri.edit', compact('santri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        
        $validatedData = $request->validate([
            'id_santri' => 'required|size:6',
            'nama' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'nik' => 'required|size:16',
            'jenis_kelamin' => 'required',
            'kamar' => 'required',
            'jenjang' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'nomer_telp_orangtua' => 'required',
            'no_kk' => 'required|size:16',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        $santri = Santri::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($santri->image) {
                Storage::delete('public/foto_santri/'.$santri->image);
            }
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public/foto_santri', $imageName);
            $validatedData['image'] = $imageName;
        }

        $santri->update($validatedData);

        return redirect()->route('santri.index')->with('success', 'Data Santri berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $santri = Santri::findOrFail($id);
        $santri->delete();
        return redirect()->route('santri.index')->with('success', 'Data Santri berhasil dihapus!');
    }
    
}
