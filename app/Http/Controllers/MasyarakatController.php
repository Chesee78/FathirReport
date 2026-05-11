<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class MasyarakatController extends Controller
{
    public function dashboard()
    {
        $pengaduan = auth()->user()->pengaduan()->with('tanggapan.petugas')->latest()->get();
        return view('masyarakat.dashboard', compact('pengaduan'));
    }
}
