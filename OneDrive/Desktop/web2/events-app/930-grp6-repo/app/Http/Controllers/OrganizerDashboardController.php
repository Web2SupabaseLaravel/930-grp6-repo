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
}
