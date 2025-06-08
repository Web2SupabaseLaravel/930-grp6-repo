<?php

namespace App\Http\Controllers;

use App\Models\attendee_events_search;
use Illuminate\Http\Request;

class AttendeeEventsSearchController extends Controller
{
    public function index()
    {
        $searches = attendee_events_search::with(['attendee', 'event'])->get();
        return response()->json($searches);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'attendee_id' => 'required|exists:attendees,id',
            'event_id' => 'required|exists:events,id',
        ]);

        $search = attendee_events_search::create($validated);
        return response()->json($search, 201);
    }

    public function show($id)
    {
        $search = attendee_events_search::with(['attendee', 'event'])->findOrFail($id);
        return response()->json($search);
    }

    public function update(Request $request, $id)
    {
        $search = attendee_events_search::findOrFail($id);

        $validated = $request->validate([
            'attendee_id' => 'sometimes|exists:attendees,id',
            'event_id' => 'sometimes|exists:events,id',
        ]);

        $search->update($validated);
        return response()->json($search);
    }

    public function destroy($id)
    {
        $search = attendee_events_search::findOrFail($id);
        $search->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

/*AttendeeEventsSearchController<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AttendeeEventsSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttendeeEventsSearchController extends Controller
{
    public function index(Request $request)
    {
        $query = AttendeeEventsSearch::query();
        if ($request->has("attendee_id")) {
            $query->where("attendee_id", $request->input("attendee_id"));
        }
        return $query->with("attendee")->paginate();
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "attendee_id" => "required|exists:attendees,id",
            "search_query" => "required|string|max:255",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $search = AttendeeEventsSearch::create($validator->validated());
        return response()->json($search->load("attendee"), 201);
    }
    public function show(AttendeeEventsSearch $attendeeEventsSearch)
    {
        return response()->json($attendeeEventsSearch->load("attendee"));
    }
    public function update(Request $request, AttendeeEventsSearch $attendeeEventsSearch)
    {
        $validator = Validator::make($request->all(), [
            "attendee_id" => "sometimes|required|exists:attendees,id",
            "search_query" => "sometimes|required|string|max:255",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $attendeeEventsSearch->update($validator->validated());
        return response()->json($attendeeEventsSearch->load("attendee"));
    }

    public function destroy(AttendeeEventsSearch $attendeeEventsSearch)
    {
        $attendeeEventsSearch->delete();
        return response()->json(null, 204);
    }
}

 */
