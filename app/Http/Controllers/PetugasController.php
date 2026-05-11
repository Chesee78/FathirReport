<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PetugasController extends Controller
{
    // 🔹 Halaman dashboard petugas (lihat semua pengaduan)
    public function index()
    {
        $pengaduan = Pengaduan::latest()->get();
        return view('petugas.dashboard', compact('pengaduan'));
    }

    // 🔹 ACC pengaduan
    public function acc($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        if (auth()->user()->role != 'petugas') {
            abort(403);
        }

        $pengaduan->update([
            'status' => 'disetujui'
        ]);

        return back()->with('success', 'Pengaduan berhasil di-ACC');
    }
}