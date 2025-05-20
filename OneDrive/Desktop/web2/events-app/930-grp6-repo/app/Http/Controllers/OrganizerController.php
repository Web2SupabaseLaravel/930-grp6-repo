<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function index()
    {
        $organizers = Organizer::all();
        return view('organizers.index', compact('organizers'));
    }

    public function create()
    {
        return view('organizers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:organizers',
            'phone' => 'required|string',
            'address' => 'nullable|string'
        ]);

        $organizer = Organizer::create($validated);
        return redirect()->route('organizers.index')->with('success', 'Organizer created successfully');
    }

    public function edit(Organizer $organizer)
    {
        return view('organizers.edit', compact('organizer'));
    }

    public function update(Request $request, Organizer $organizer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:organizers,email,'.$organizer->id,
            'phone' => 'required|string',
            'address' => 'nullable|string'
        ]);

        $organizer->update($validated);
        return redirect()->route('organizers.index')->with('success', 'Organizer updated successfully');
    }

    public function destroy(Organizer $organizer)
    {
        $organizer->delete();
        return redirect()->route('organizers.index')->with('success', 'Organizer deleted successfully');
    }
}
