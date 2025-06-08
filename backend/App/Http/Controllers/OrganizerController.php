<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function index()
    {
        $organizers = Organizer::with('human')->paginate(10);
        return response()->json($organizers);
    }

    public function show($id)
    {
        $organizer = Organizer::with('human')->find($id);
        if (!$organizer) {
            return response()->json(['message' => 'Organizer not found'], 404);
        }
        return response()->json($organizer);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'human_id' => 'required|exists:human,human_id',

        ]);

        $organizer = Organizer::create($validated);

        return response()->json($organizer, 201);
    }

    public function update(Request $request, $id)
    {
        $organizer = Organizer::find($id);
        if (!$organizer) {
            return response()->json(['message' => 'Organizer not found'], 404);
        }

        $validated = $request->validate([
            'human_id' => 'sometimes|required|exists:human,human_id',
            
        ]);

        $organizer->update($validated);

        return response()->json($organizer);
    }

    public function destroy($id)
    {
        $organizer = Organizer::find($id);
        if (!$organizer) {
            return response()->json(['message' => 'Organizer not found'], 404);
        }

        $organizer->delete();

        return response()->json(null, 204);
    }
}
/*
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
} */
