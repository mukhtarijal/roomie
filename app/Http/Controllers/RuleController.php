<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Kos;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index($kosId)
    {
        $kos = Kos::with('rules')->findOrFail($kosId);
        return view('rules.index', compact('kos'));
    }

    public function create($kosId)
    {
        $kos = Kos::findOrFail($kosId);
        return view('rules.create', compact('kos'));
    }

    public function store(Request $request, $kosId)
    {
        $validated = $request->validate([
            'rule' => 'required|string|max:1000',
        ]);

        $validated['kos_id'] = $kosId;

        Rule::create($validated);

        return redirect()->route('rules.index', $kosId)->with('success', 'Rule added successfully.');
    }

    public function destroy(Rule $rule)
    {
        $rule->delete();
        return back()->with('success', 'Rule deleted successfully.');
    }
}
