<?php

namespace App\Http\Controllers;

use App\Models\ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = ticket::with('organizer')->get();
        return response()->json($tickets);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sales' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'seat' => 'nullable|string',
            'description' => 'nullable|string',
            'paid' => 'nullable|boolean',
            'free' => 'nullable|boolean',
            'organizer_id' => 'required|exists:organizers,organizer_id',
            'created_at' => 'nullable|date',
            'qr_code' => 'nullable|string',
        ]);

        $ticket = ticket::create($validated);
        return response()->json($ticket, 201);
    }

    public function show($id)
    {
        $ticket = ticket::with('organizer')->findOrFail($id);
        return response()->json($ticket);
    }

    public function update(Request $request, $id)
    {
        $ticket = ticket::findOrFail($id);

        $validated = $request->validate([
            'sales' => 'nullable|numeric',
            'quantity' => 'sometimes|integer',
            'seat' => 'nullable|string',
            'description' => 'nullable|string',
            'paid' => 'nullable|boolean',
            'free' => 'nullable|boolean',
            'organizer_id' => 'sometimes|exists:organizers,organizer_id',
            'created_at' => 'nullable|date',
            'qr_code' => 'nullable|string',
        ]);

        $ticket->update($validated);
        return response()->json($ticket);
    }

    public function destroy($id)
    {
        $ticket = ticket::findOrFail($id);
        $ticket->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
/*
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date'
        ]);

        $ticket = Ticket::create($validated);

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket created successfully');
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());
        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);

        // Delete associated events first
        $ticket->events()->delete();

        // Then delete the ticket
        $ticket->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'تم حذف التذكرة بنجاح');
    }

    public function activate($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->free = false;
        $ticket->save();

        return redirect()->route('tickets.index')
            ->with('success', 'تم تفعيل التذكرة بنجاح');
    }

    public function deactivate($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->free = true;
        $ticket->save();

        return redirect()->route('tickets.index')
            ->with('success', 'تم تعطيل التذكرة بنجاح');
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.edit', compact('ticket'));
    }
}
 */
