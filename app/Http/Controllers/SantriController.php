<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ExportSantri;
use App\Imports\SantriImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Santri::query();
    
        if ($request->filled('kamar')) {
            $query->where('kamar', $request->kamar);
        }
    
        if ($request->filled('jenjang')) {
            $query->where('jenjang', $request->jenjang);
        }
    
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
    
        $santri = $query->get();
        $kamarList = Santri::select('kamar')->distinct()->get();
        $jenjangList = ['Staff pengajar', 'Aliyah', 'Tsanawiyah', 'Ibtidaiyah'];
        $statusList = ['aktif', 'tidak aktif'];
    
        return view('dashboard.admin.santri.index', compact('santri', 'kamarList', 'jenjangList', 'statusList'));
    }

    public function import_csv(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt,xlsx',
        ]);

        Excel::import(new SantriImport, $request->file('file'));

        return redirect()->route('santri.index')->with('success', 'Data Santri berhasil diimport!');
    }
    

    public function export_excel(Request $request)
    {
        $query = Santri::query();
    
        if ($request->filled('kamar')) {
            $query->where('kamar', $request->kamar);
        }
    
        if ($request->filled('jenjang')) {
            $query->where('jenjang', $request->jenjang);
        }
    
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
    
        $santri = $query->select([
            'id_santri',
            'nama',
            'nik',
            'jenis_kelamin',
            'kamar',
            'jenjang',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'provinsi',
            'kabupaten',
            'nama_ayah',
            'nama_ibu',
            'nomer_telp_orangtua',
            'no_kk',
            'status'
        ])->get();
    
        return Excel::download(new ExportSantri($santri), 'listsantri.xlsx');
    }

    public function export_csv(Request $request)
    {
        $query = Santri::query();
    
        if ($request->filled('kamar')) {
            $query->where('kamar', $request->kamar);
        }
    
        if ($request->filled('jenjang')) {
            $query->where('jenjang', $request->jenjang);
        }
    
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
    
        $santri = $query->select([
            'id_santri',
            'nama',
            'image',
            'nik',
            'jenis_kelamin',
            'kamar',
            'jenjang',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'provinsi',
            'kabupaten',
            'nama_ayah',
            'nama_ibu',
            'nomer_telp_orangtua',
            'no_kk',
            'status'
        ])->get();
    
        return Excel::download(new ExportSantri($santri), 'listsantri.csv', \Maatwebsite\Excel\Excel::CSV);
    }
    
    


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.admin.santri.create');
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

    // Proses untuk menyimpan gambar dengan nama acak 5 karakter
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $randomString = Str::random(5); // Menghasilkan string acak 5 karakter
        $extension = $image->getClientOriginalExtension(); // Mendapatkan ekstensi file
        $imageName = $randomString . '.' . $extension; // Menggabungkan string acak dengan ekstensi
        
        // Tentukan path direktori untuk penyimpanan di httpdocs/foto_santri
        $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/foto_santri';
        
        // Pindahkan file ke direktori tujuan
        $image->move($destinationPath, $imageName);

        $validatedData['image'] = $imageName;
    }

    // Membuat data santri baru
    Santri::create($validatedData);

    return redirect()->route('santri.index')->with('success', 'Data Santri berhasil disimpan!');
}


    /**
     * Display the specified resource.
     */
public function show($id)
{
    $santri = Santri::findOrFail($id);
    return response()->json($santri);
}



public function profile($id = null): View
{
    $santri = null;
    if ($id) {
        $santri = Santri::find($id);
    }
    return view('dashboard.admin.santri.profile', compact('santri'));
}

public function searchProfile(Request $request): View
{
    $messages = [
        'id_santri.required' => 'Field ID Santri wajib diisi.',
        'id_santri.exists' => 'ID Santri tidak ditemukan di database.',
    ];

    $request->validate([
        'id_santri' => 'required|exists:santris,id_santri'
    ], $messages);

    $santri = Santri::where('id_santri', $request->id_santri)->firstOrFail();
    return view('dashboard.admin.santri.profile', compact('santri'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $santri = Santri::findOrFail($id);
        return view('dashboard.admin.santri.edit', compact('santri'));
    }


    /**
     * Update the specified resource in storage.
     */

   public function update(Request $request, $id): RedirectResponse
{
    // Validasi data input
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
    
    // Cari data santri berdasarkan ID
    $santri = Santri::findOrFail($id);
    
    // Periksa apakah ada file gambar yang diunggah
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($santri->image) {
            $oldImagePath = $_SERVER['DOCUMENT_ROOT'] . '/foto_santri/' . $santri->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        
        // Simpan gambar baru
        $image = $request->file('image');
        $randomString = Str::random(5); // Menghasilkan string acak 5 karakter
        $extension = $image->getClientOriginalExtension(); // Mendapatkan ekstensi file
        $imageName = $randomString . '.' . $extension; // Menggabungkan string acak dengan ekstensi
        
        // Tentukan path direktori untuk penyimpanan di httpdocs/foto_santri
        $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/foto_santri';
        
        // Pindahkan file ke direktori tujuan
        $image->move($destinationPath, $imageName);
        
        $validatedData['image'] = $imageName;
    }
    
    // Perbarui data santri
    $santri->update($validatedData);
    
    // Redirect kembali ke halaman index santri dengan pesan sukses
    return redirect()->route('santri.index')->with('success', 'Data Santri berhasil diperbarui!');
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $santri = Santri::findOrFail($id);
        $santri->delete();
        
        if (request()->ajax()) {
            return response()->json(['success' => true, 'message' => 'Data Santri berhasil dihapus!']);
        }
        
        return redirect()->route('santri.index')->with('success', 'Data Santri berhasil dihapus!');
    }
    
}

