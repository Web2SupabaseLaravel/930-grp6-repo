<?php

namespace App\Http\Controllers;

use App\Models\admin_ticket_access;
use Illuminate\Http\Request;

class AdminTicketAccessController extends Controller
{
    public function index()
    {
        $accesses = admin_ticket_access::with(['admin', 'event', 'ticket'])->get();
        return response()->json($accesses);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'admin_id' => 'required|exists:admins,id',
            'event_id' => 'required|exists:events,id',
            'ticket_id' => 'required|exists:tickets,id',
        ]);

        $access = admin_ticket_access::create($validated);
        return response()->json($access, 201);
    }

    public function show($id)
    {
        $access = admin_ticket_access::with(['admin', 'event', 'ticket'])->findOrFail($id);
        return response()->json($access);
    }

    public function update(Request $request, $id)
    {
        $access = admin_ticket_access::findOrFail($id);

        $validated = $request->validate([
            'admin_id' => 'sometimes|exists:admins,id',
            'event_id' => 'sometimes|exists:events,id',
            'ticket_id' => 'sometimes|exists:tickets,id',
        ]);

        $access->update($validated);
        return response()->json($access);
    }

    public function destroy($id)
    {
        $access = admin_ticket_access::findOrFail($id);
        $access->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
