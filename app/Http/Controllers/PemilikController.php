<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kos;
use App\Models\Penyewaan;

class PemilikController extends Controller
{
    public function index()
    {
        // Data untuk summary
        $totalKos = Kos::count(); // Menghitung total kos
        $totalKamar = Kos::sum('jumlah_kamar'); // Total semua kamar kos

        return view('pemilik.index', compact('totalKos', 'totalKamar', 'penghasilanBulanan'));
    }
}
