<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pengaduan;
class PengaduanController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'isi_laporan' => 'required',
        'foto' => 'image|mimes:jpg,png,jpeg|max:2048'
    ]);

    $fotoPath = null;

    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('pengaduan', 'public');
    }

    Pengaduan::create([
        'user_id' => auth()->id(),
        'nik' => auth()->user()->nik,
        'tgl_pengaduan' => now(),
        'isi_laporan' => $request->isi_laporan,
        'foto' => $fotoPath,
        'status' => 'pending'
    ]);

    return back()->with('success', 'Pengaduan berhasil dikirim!');
}
public function index()
{
    $pengaduan = Pengaduan::latest()->get();
    return view('admin.pengaduan', compact('pengaduan'));
}
}   
?>