<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function index()
    {
        $attendees = Attendee::with('human')->paginate(10);
        return response()->json($attendees);
    }

    public function show($id)
    {
        $attendee = Attendee::with('human')->find($id);
        if (!$attendee) {
            return response()->json(['message' => 'Attendee not found'], 404);
        }
        return response()->json($attendee);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'human_id' => 'required|exists:human,human_id',

        ]);

        $attendee = Attendee::create($validated);

        return response()->json($attendee, 201);
    }

    public function update(Request $request, $id)
    {
        $attendee = Attendee::find($id);
        if (!$attendee) {
            return response()->json(['message' => 'Attendee not found'], 404);
        }

        $validated = $request->validate([
            'human_id' => 'sometimes|required|exists:human,human_id',

        ]);

        $attendee->update($validated);

        return response()->json($attendee);
    }

    public function destroy($id)
    {
        $attendee = Attendee::find($id);
        if (!$attendee) {
            return response()->json(['message' => 'Attendee not found'], 404);
        }

        $attendee->delete();

        return response()->json(null, 204);
    }
}

/*
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AttendeeController extends Controller
{

    public function index()
    {
        return Attendee::paginate();
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:attendees",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $attendee = Attendee::create($validator->validated());
        return response()->json($attendee, 201);
    }


    public function show(Attendee $attendee)
    {
        return response()->json($attendee);
    }


    public function update(Request $request, Attendee $attendee)
    {
        $validator = Validator::make($request->all(), [
            "name" => "sometimes|required|string|max:255",
            "email" => "sometimes|required|string|email|max:255|unique:attendees,email," . $attendee->id,
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $attendee->update($validator->validated());
        return response()->json($attendee);
    }


    public function destroy(Attendee $attendee)
    {
        $attendee->delete();
        return response()->json(null, 204);
    }
}
*/
