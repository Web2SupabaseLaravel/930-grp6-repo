<?php

namespace App\Http\Controllers;

use App\Models\organizer_dashboard;
use Illuminate\Http\Request;

class OrganizerDashboardController extends Controller
{
    public function index()
    {
        $dashboards = organizer_dashboard::with(['organizer', 'event'])->get();
        return response()->json($dashboards);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'organizer_id' => 'required|exists:organizers,id',
            'event_id' => 'required|exists:events,id',
        ]);

        $dashboard = organizer_dashboard::create($validated);
        return response()->json($dashboard, 201);
    }

    public function show($id)
    {
        $dashboard = organizer_dashboard::with(['organizer', 'event'])->findOrFail($id);
        return response()->json($dashboard);
    }

    public function update(Request $request, $id)
    {
        $dashboard = organizer_dashboard::findOrFail($id);

        $validated = $request->validate([
            'organizer_id' => 'sometimes|exists:organizers,id',
            'event_id' => 'sometimes|exists:events,id',
        ]);

        $dashboard->update($validated);
        return response()->json($dashboard);
    }

    public function destroy($id)
    {
        $dashboard = organizer_dashboard::findOrFail($id);
        $dashboard->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

/*
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganizerDashboard;

class OrganizerDashboardController extends Controller
{
    public function index()
    {
        return OrganizerDashboard::with(['organizer', 'event'])->get();
    }

    public function show($id)
    {
        $dashboard = OrganizerDashboard::with(['organizer', 'event'])->findOrFail($id);
        return response()->json($dashboard);
    }

    public function update(Request $request, $id)
    {
        $dashboard = OrganizerDashboard::findOrFail($id);
        $dashboard->update($request->all());
        return response()->json($dashboard);
    }
} */
