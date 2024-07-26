<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumentasis = Dokumentasi::all();
        return view('dashboard.admin.dokumentasi.index', compact('dokumentasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.dokumentasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:image,video',
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:20480'
        ]);

        // Mendapatkan file dari request
        $file = $request->file('file');

        // Menentukan direktori penyimpanan berdasarkan jenis file
        $directory = 'foto_santri/dokumentasi';

        // Membuat nama file yang unik
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Menyimpan file ke dalam direktori penyimpanan
        $filePath = $file->move(public_path($directory), $fileName);

        // Membuat entri Dokumentasi di database
        $dokumentasi = Dokumentasi::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'path' => $directory . '/' . $fileName
        ]);

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumentasi $dokumentasi)
    {
        return view('dashboard.admin.dokumentasi.show', compact('dokumentasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumentasi $dokumentasi)
    {
        return view('dashboard.admin.dokumentasi.edit', compact('dokumentasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:image,video',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:20480'
        ]);

        $data = $request->only(['title', 'description', 'type']);

        if ($request->hasFile('file')) {
            // Menghapus file lama dari direktori
            $oldFilePath = public_path($dokumentasi->path);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            // Mendapatkan file baru dari request
            $file = $request->file('file');

            // Membuat nama file yang unik
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Menyimpan file baru ke dalam direktori penyimpanan
            $filePath = $file->move(public_path('foto_santri/dokumentasi'), $fileName);

            // Mengupdate path pada data Dokumentasi
            $data['path'] = 'foto_santri/dokumentasi/' . $fileName;
        }

        // Mengupdate data Dokumentasi
        $dokumentasi->update($data);

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumentasi $dokumentasi)
    {
        // Menghapus file dari direktori
        $filePath = public_path($dokumentasi->path);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Menghapus entri dari database
        $dokumentasi->delete();

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil dihapus.');
    }
}
