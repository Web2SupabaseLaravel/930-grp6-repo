<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AttendeeEventsSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Tag(name="Attendee Events Searches")
 */
class AttendeeEventsSearchController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/attendee-events-searches",
     *     tags={"Attendee Events Searches"},
     *     summary="Get list of attendee event searches",
     *     description="Returns a paginated list of event searches made by attendees",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page number",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="attendee_id",
     *         in="query",
     *         description="Filter by Attendee ID",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/AttendeeEventsSearch")),
     *             @OA\Property(property="links", type="object"),
     *             @OA\Property(property="meta", type="object")
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        $query = AttendeeEventsSearch::query();
        if ($request->has("attendee_id")) {
            $query->where("attendee_id", $request->input("attendee_id"));
        }
        return $query->with("attendee")->paginate();
    }

    /**
     * @OA\Post(
     *     path="/api/attendee-events-searches",
     *     tags={"Attendee Events Searches"},
     *     summary="Create a new attendee event search record",
     *     description="Adds a new event search record for an attendee",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AttendeeEventsSearchRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Search record created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/AttendeeEventsSearch")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/api/attendee-events-searches/{attendeeEventsSearch}",
     *     tags={"Attendee Events Searches"},
     *     summary="Get specific event search record information",
     *     description="Returns event search data by ID",
     *     @OA\Parameter(
     *         name="attendeeEventsSearch",
     *         in="path",
     *         description="ID of event search record to return",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/AttendeeEventsSearch")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Search record not found"
     *     )
     * )
     */
    public function show(AttendeeEventsSearch $attendeeEventsSearch)
    {
        return response()->json($attendeeEventsSearch->load("attendee"));
    }

    /**
     * @OA\Put(
     *     path="/api/attendee-events-searches/{attendeeEventsSearch}",
     *     tags={"Attendee Events Searches"},
     *     summary="Update an existing event search record",
     *     description="Updates event search data by ID",
     *     @OA\Parameter(
     *         name="attendeeEventsSearch",
     *         in="path",
     *         description="ID of event search record to update",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AttendeeEventsSearchRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Search record updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/AttendeeEventsSearch")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Search record not found"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/api/attendee-events-searches/{attendeeEventsSearch}",
     *     tags={"Attendee Events Searches"},
     *     summary="Delete an event search record",
     *     description="Deletes an event search record by ID",
     *     @OA\Parameter(
     *         name="attendeeEventsSearch",
     *         in="path",
     *         description="ID of event search record to delete",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Search record deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Search record not found"
     *     )
     * )
     */
    public function destroy(AttendeeEventsSearch $attendeeEventsSearch)
    {
        $attendeeEventsSearch->delete();
        return response()->json(null, 204);
    }
}

