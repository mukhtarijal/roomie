<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::with('user', 'kos')->get();
        return view('pengajuan.index', compact('pengajuan'));
    }

    public function approve(Pengajuan $pengajuan)
    {
        $pengajuan->update(['status' => 2]); // Menunggu pembayaran
        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan approved.');
    }

    public function reject(Pengajuan $pengajuan)
    {
        $pengajuan->update(['status' => 0]); // Ditolak
        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan rejected.');
    }
}
