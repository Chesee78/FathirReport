<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    // 🔹 Form tanggapan / View tanggapan
    public function create($id)
    {
        $pengaduan = Pengaduan::with('tanggapan.petugas')->findOrFail($id);

        // Cek apakah user adalah pemilik pengaduan atau petugas/admin
        $user = Auth::user();
        $isOwner = $pengaduan->user_id == $user->id;
        $isPetugas = in_array($user->role, ['admin', 'petugas']);

        if (!$isOwner && !$isPetugas) {
            abort(403, 'Anda tidak memiliki akses ke pengaduan ini');
        }

        return view('tanggapan', compact('pengaduan', 'isOwner', 'isPetugas'));
    }

    // 🔹 Simpan tanggapan
    public function store(Request $request)
    {
        $request->validate([
            'pengaduan_id' => 'required|exists:pengaduan,id',
            'tanggapan' => 'required'
        ]);

        Tanggapan::create([
            'pengaduan_id' => $request->pengaduan_id,
            'petugas_id' => Auth::id(),
            'tgl_tanggapan' => now(),
            'tanggapan' => $request->tanggapan
        ]);

        // 🔥 Update status pengaduan jadi selesai
        $pengaduan = Pengaduan::find($request->pengaduan_id);
        $pengaduan->update([
            'status' => 'selesai'
        ]);

        return back()->with('success', 'Tanggapan berhasil dikirim!');
    }
}