<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Menampilkan daftar pengumuman.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = Schedule::all();
        return view('dashboard.admin.pengumuman.index', compact('data'));
    }

    /**
     * Menyimpan data pengumuman baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'event' => 'required',
            'open' => 'required|date',
            'close' => 'required|date',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')->with('success', 'Pengumuman berhasil disimpan.');
    }

        /**
     * Menampilkan form untuk mengedit data pengumuman.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('dashboard.admin.pengumuman.edit', compact('schedule'));
    }

    /**
     * Memperbarui data pengumuman yang ada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'event' => 'required',
            'open' => 'required|date',
            'close' => 'required|date',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->all());

        return redirect()->route('schedules.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    /**
     * Menghapus data pengumuman.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Data Pengumuman berhasil dihapus!');

    }

}