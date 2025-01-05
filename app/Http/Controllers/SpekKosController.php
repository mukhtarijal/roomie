<?php

namespace App\Http\Controllers;

use App\Models\SpekKos;
use App\Models\Kos;
use Illuminate\Http\Request;

class SpekKosController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kos_id' => 'required|exists:kos,id',
            'room_size' => 'required|string',
            'electricity' => 'required|boolean',
            'ac' => 'required|boolean',
            'bed' => 'required|boolean',
            'wardrobe' => 'required|boolean',
            'bathroom_inside' => 'required|boolean',
            'wifi' => 'required|boolean',
        ]);

        SpekKos::create($validated);

        return redirect()->route('kos.show', $request->kos_id)->with('success', 'SpekKos added successfully.');
    }
}
