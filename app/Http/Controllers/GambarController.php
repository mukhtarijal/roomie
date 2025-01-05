<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Kos;
use Illuminate\Http\Request;

class GambarController extends Controller
{
    public function index($kosId)
    {
        $kos = Kos::with('gambar')->findOrFail($kosId);
        return view('gambar.index', compact('kos'));
    }

    public function create($kosId)
    {
        $kos = Kos::findOrFail($kosId);
        return view('gambar.create', compact('kos'));
    }

    public function store(Request $request, $kosId)
    {
        $validated = $request->validate([
            'foto_kost' => 'required|image|max:2048',
            'foto_kamar' => 'required|image|max:2048',
            'foto_kamar_mandi' => 'required|image|max:2048',
            'foto_fasilitas_bersama' => 'required|image|max:2048',
        ]);

        $validated['kos_id'] = $kosId;

        // Simpan gambar
        foreach (['foto_kost', 'foto_kamar', 'foto_kamar_mandi', 'foto_fasilitas_bersama'] as $field) {
            $validated[$field] = $request->file($field)->store('kos_images', 'public');
        }

        Gambar::create($validated);

        return redirect()->route('gambar.index', $kosId)->with('success', 'Gambar uploaded successfully.');
    }

    public function destroy(Gambar $gambar)
    {
        $gambar->delete();
        return back()->with('success', 'Gambar deleted successfully.');
    }
}
