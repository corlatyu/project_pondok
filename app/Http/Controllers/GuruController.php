<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Milon\Barcode\DNS1D;
use Illuminate\Http\Request;
use Milon\Barcode\Facades\DNS1DFacade;

class GuruController extends Controller
{
    // Metode antarmuka web

    public function index()
    {
        $gurus = Guru::all();
        return view('dashboard.admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('dashboard.admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
        ]);

        Guru::create($request->all());
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dibuat.');
    }

    public function show(Guru $guru)
    {
        return view('dashboard.admin.guru.show', compact('guru'));
    }

    public function edit(Guru $guru)
    {
        return view('dashboard.admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
        ]);

        $guru->update($request->all());
        return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }

    // Metode API

    public function apiIndex()
    {
        $gurus = Guru::all();
        return response()->json($gurus);
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
        ]);

        $guru = Guru::create($request->all());
        return response()->json(['message' => 'Guru berhasil dibuat.', 'guru' => $guru], 201);
    }

    public function apiShow(Guru $guru)
    {
        return response()->json($guru);
    }

    public function apiUpdate(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
        ]);

        $guru->update($request->all());
        return response()->json(['message' => 'Guru berhasil diperbarui.', 'guru' => $guru]);
    }

    public function apiDestroy(Guru $guru)
    {
        $guru->delete();
        return response()->json(['message' => 'Guru berhasil dihapus.']);
    }
}
