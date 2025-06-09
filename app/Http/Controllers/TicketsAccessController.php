<?php

namespace App\Http\Controllers;

use App\Models\AdminTicketAccess;
use App\Models\Admin;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketsAccessController extends Controller
{
    public function index()
    {
        $accesses = AdminTicketAccess::all();
        $admins = Admin::all();
        $events = Event::all();
        $tickets = Ticket::all();

        return view('admin.tickets_access.index', compact('accesses', 'admins', 'events', 'tickets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'admin_id'  => 'required|integer|exists:admins,id',
            'event_id'  => 'required|integer|exists:events,id',
            'ticket_id' => 'required|integer|exists:tickets,id',
        ]);

        if ($request->filled('id')) {
            $access = AdminTicketAccess::findOrFail($request->id);
            $access->update($request->only(['admin_id', 'event_id', 'ticket_id']));
            return redirect()->route('tickets-access.index')->with('success', 'Access updated successfully.');
        } else {
            AdminTicketAccess::create($request->only(['admin_id', 'event_id', 'ticket_id']));
            return redirect()->route('tickets-access.index')->with('success', 'Access created successfully.');
        }
    }

    public function destroy($id)
    {
        $access = AdminTicketAccess::findOrFail($id);
        $access->delete();

        return redirect()->route('tickets-access.index')->with('success', 'Access deleted successfully.');
    }
}
