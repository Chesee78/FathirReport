<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pengaduan = Pengaduan::all();
        $total_pengaduan = $pengaduan->count();
        $pending = $pengaduan->where('status', 'pending')->count();
        $disetujui = $pengaduan->where('status', 'disetujui')->count();
        $selesai = $pengaduan->where('status', 'selesai')->count();

        return view('admin.dashboard', compact('total_pengaduan', 'pending', 'disetujui', 'selesai'));
    }

    public function pengaduan()
    {
        $pengaduan = Pengaduan::latest()->get();
        return view('admin.pengaduan', compact('pengaduan'));
    }
}
