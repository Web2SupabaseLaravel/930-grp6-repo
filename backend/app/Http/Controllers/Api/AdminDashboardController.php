<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AdminDashboard;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return AdminDashboard::all();
    }

   public function store(Request $request) {
    $validated = $request->validate([
        'dashboard' => 'required',
        'event_registrations' => 'required',
        'revenue' => 'required',
        'attendee_demographics' => 'required',
        'admin_id' => 'required|exists:admin,admin_id'
    ]);

    AdminDashboard::create($validated);

    return response()->json(['message' => 'Dashboard created'], 201);
}


    public function update(Request $request, $id)
    {
        $dashboard = AdminDashboard::findOrFail($id);
        $dashboard->update($request->all());
        return $dashboard;
    }

    public function destroy($id)
    {
        $dashboard = AdminDashboard::findOrFail($id);
        $dashboard->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
