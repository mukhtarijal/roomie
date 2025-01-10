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
        $kos = Kos::all();

        return view('kos_saya', compact('kos'));
    }

    public function create()
    {
        return view('kos.create'); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'address' => 'required|string',
            'available_rooms' => 'required|integer',
            'gender_kos' => 'required|string',
            'price' => 'required|numeric',
            'phone_number' => 'required|string',
            'status' => 'required|integer',
            'foto_kost' => 'required|image',
            'foto_kamar' => 'required|image',
            'foto_kamar_mandi' => 'required|image',
            'foto_fasilitas_bersama' => 'required|image',
        ]);

        $validatedData['foto_kost'] = $request->file('foto_kost')->store('foto_kost', 'public');
        $validatedData['foto_kamar'] = $request->file('foto_kamar')->store('foto_kamar', 'public');
        $validatedData['foto_kamar_mandi'] = $request->file('foto_kamar_mandi')->store('foto_kamar_mandi', 'public');
        $validatedData['foto_fasilitas_bersama'] = $request->file('foto_fasilitas_bersama')->store('foto_fasilitas_bersama', 'public');

        Kos::create($validatedData);

        return redirect()->route('kos_saya')->with('success', 'Data kos berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $kos = Kos::findOrFail($id); // Mengambil data kos berdasarkan ID
        return view('kos.edit', compact('kos')); // Tampilkan form edit
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'address' => 'required|string',
            'gender_kos' => 'required|in:P,L',
            'available_rooms' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $kos = Kos::findOrFail($id);
        $kos->update($request->all()); // Update data kos
        return redirect()->route('kos.index')->with('success', 'Data kos berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        // Cari data kos berdasarkan ID
        $kos = Kos::find($id);

        // Periksa apakah data ditemukan
        if (!$kos) {
            return redirect()->route('kos.index')->with('error', 'Data Kos tidak ditemukan.');
        }

        // Hapus data
        $kos->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('kos.index')->with('success', 'Data Kos berhasil dihapus.');
    }
}