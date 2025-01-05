<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class KosController extends Controller
{
    public function index()
    {
        $kos = Kos::with('spesifikasi', 'rules', 'gambar')->get();
        return view('kos.index', compact('kos'));
    }

    public function create()
    {
        return view('kos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'available_rooms' => 'required|integer|min:0',
            'gender_kos' => 'required|in:L,P,Campur',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:0,1,2,3',
            'phone_number' => 'required|string|max:15',
        ]);

        Kos::create($validated);

        return redirect()->route('kos.index')->with('success', 'Kos created successfully.');
    }

    public function edit(Kos $kos)
    {
        return view('kos.edit', compact('kos'));
    }

    public function update(Request $request, Kos $kos)
    {
        $validated = $request->validate([
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
    