<?php
namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KosController extends Controller
{
    public function index()
    {
        $kos = Kos::with('spesifikasi', 'rules', 'gambar')->get();
        return view('kos_saya', compact('kos'));
    }

    public function create()
    {
        return view('kos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'available_rooms' => 'required|integer|min:0',
            'gender_kos' => 'required|in:L,P,Campur',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:0,1,2,3',
            'phone_number' => 'required|string|max:15',
            'foto_kost.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_kamar.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_kamar_mandi.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_fasilitas_bersama.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            // Create kos record
            $kos = Kos::create([
                'nama' => $request->nama,
                'address' => $request->address,
                'gender_kos' => $request->gender_kos,
                'available_rooms' => $request->available_rooms,
                'price' => $request->price,
                'phone_number' => $request->phone_number,
                'status' => $request->status,
                'stars' => 0,
            ]);

            // Handle image uploads
            $images = [];

            // Process foto_kost
            if ($request->hasFile('foto_kost')) {
                $foto_kost = $request->file('foto_kost')[0];
                $foto_kost_path = $foto_kost->store('kos_images/kost', 'public');
                $images['foto_kost'] = $foto_kost_path;
            }

            // Process foto_kamar
            if ($request->hasFile('foto_kamar')) {
                $foto_kamar = $request->file('foto_kamar')[0];
                $foto_kamar_path = $foto_kamar->store('kos_images/kamar', 'public');
                $images['foto_kamar'] = $foto_kamar_path;
            }

            // Process foto_kamar_mandi
            if ($request->hasFile('foto_kamar_mandi')) {
                $foto_kamar_mandi = $request->file('foto_kamar_mandi')[0];
                $foto_kamar_mandi_path = $foto_kamar_mandi->store('kos_images/kamar_mandi', 'public');
                $images['foto_kamar_mandi'] = $foto_kamar_mandi_path;
            }

            // Process foto_fasilitas_bersama
            if ($request->hasFile('foto_fasilitas_bersama')) {
                $foto_fasilitas = $request->file('foto_fasilitas_bersama')[0];
                $foto_fasilitas_path = $foto_fasilitas->store('kos_images/fasilitas', 'public');
                $images['foto_fasilitas_bersama'] = $foto_fasilitas_path;
            }

            // Create gambar record
            $images['kos_id'] = $kos->id;
            Gambar::create($images);

            DB::commit();
            return redirect()->route('kos.index')->with('success', 'Kos berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit(Kos $kos)
    {
        return view('kos.edit', compact('kos'));
    }

    public function update(Request $request, Kos $kos)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'available_rooms' => 'required|integer|min:0',
            'gender_kos' => 'required|in:L,P,Campur',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:0,1,2,3',
            'phone_number' => 'required|string|max:15',
        ]);

        $kos->update($validated);

        return redirect()->route('kos.index')->with('success', 'Kos updated successfully.');
    }

    public function destroy(Kos $kos)
    {
        $kos->delete();
        return redirect()->route('kos.index')->with('success', 'Kos deleted successfully.');
    }
}
