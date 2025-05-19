<?php
namespace App\Http\Controllers;

use App\Models\AdminTicketAccess;
use Illuminate\Http\Request;

class AdminTicketAccessController extends Controller
{
    public function index()
    {
        return response()->json(AdminTicketAccess::with(['admin', 'ticket'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'admin_id' => 'required|exists:admins,id',
            'ticket_id' => 'required|exists:tickets,id',
        ]);

        $record = AdminTicketAccess::create($request->only(['admin_id', 'ticket_id']));
        return response()->json($record, 201);
    }

    public function show($id)
    {
        $record = AdminTicketAccess::with(['admin', 'ticket'])->findOrFail($id);
        return response()->json($record);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'admin_id' => 'sometimes|exists:admins,id',
            'ticket_id' => 'sometimes|exists:tickets,id',
        ]);

        $record = AdminTicketAccess::findOrFail($id);
        $record->update($request->only(['admin_id', 'ticket_id']));
        return response()->json($record);
    }

    public function destroy($id)
    {
        $record = AdminTicketAccess::findOrFail($id);
        $record->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

