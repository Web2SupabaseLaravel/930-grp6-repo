<?php

namespace App\Http\Controllers;

use App\Models\attendee_ticket_access;
use Illuminate\Http\Request;

class AttendeeTicketAccessController extends Controller
{
    public function index()
    {
        $accesses = attendee_ticket_access::with(['attendee', 'ticket'])->get();
        return response()->json($accesses);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'attendee_id' => 'required|exists:attendees,id',
            'ticket_id' => 'required|exists:tickets,id',
        ]);

        $access = attendee_ticket_access::create($validated);
        return response()->json($access, 201);
    }

    public function show($id)
    {
        $access = attendee_ticket_access::with(['attendee', 'ticket'])->findOrFail($id);
        return response()->json($access);
    }

    public function update(Request $request, $id)
    {
        $access = attendee_ticket_access::findOrFail($id);

        $validated = $request->validate([
            'attendee_id' => 'sometimes|exists:attendees,id',
            'ticket_id' => 'sometimes|exists:tickets,id',
        ]);

        $access->update($validated);
        return response()->json($access);
    }

    public function destroy($id)
    {
        $access = attendee_ticket_access::findOrFail($id);
        $access->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}


/*<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AttendeeTicketAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttendeeTicketAccessController extends Controller
{
    public function index(Request $request)
    {
        $query = AttendeeTicketAccess::query();
        if ($request->has("attendee_id")) {
            $query->where("attendee_id", $request->input("attendee_id"));
        }
        return $query->with("attendee")->paginate();
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "attendee_id" => "required|exists:attendees,id",
            "ticket_code" => "required|string|max:255|unique:attendee_ticket_accesses",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $ticketAccess = AttendeeTicketAccess::create($validator->validated());
        return response()->json($ticketAccess->load("attendee"), 201);
    }
    public function show(AttendeeTicketAccess $attendeeTicketAccess)
    {
        return response()->json($attendeeTicketAccess->load("attendee"));
    }
    public function update(Request $request, AttendeeTicketAccess $attendeeTicketAccess)
    {
        $validator = Validator::make($request->all(), [
            "attendee_id" => "sometimes|required|exists:attendees,id",
            "ticket_code" => "sometimes|required|string|max:255|unique:attendee_ticket_accesses,ticket_code," . $attendeeTicketAccess->id,
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $attendeeTicketAccess->update($validator->validated());
        return response()->json($attendeeTicketAccess->load("attendee"));
    }

    public function destroy(AttendeeTicketAccess $attendeeTicketAccess)
    {
        $attendeeTicketAccess->delete();
        return response()->json(null, 204);
    }
}

 */
