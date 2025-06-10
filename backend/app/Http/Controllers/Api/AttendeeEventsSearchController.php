<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AttendeeEventsSearch;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class AttendeeEventsSearchController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/attendee-events-searches",
     *     summary="Get all event searches",
     *     tags={"Event Searches"},
     *     @OA\Response(
     *         response=200,
     *         description="List of event searches"
     *     )
     * )
     */
    public function index()
    {
        return response()->json(AttendeeEventsSearch::with('attendee')->get());
    }

    /**
     * @OA\Post(
     *     path="/api/attendee-events-searches",
     *     summary="Create a new event search",
     *     tags={"Event Searches"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"attendee_id", "search_query"},
     *             @OA\Property(property="attendee_id", type="integer"),
     *             @OA\Property(property="search_query", type="string"),
     *             @OA\Property(property="search_date", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Event search created successfully"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'attendee_id' => 'required|exists:attendee,id',
            'search_query' => 'required|string',
            'search_date' => 'nullable|date'
        ]);

        if (!isset($validated['search_date'])) {
            $validated['search_date'] = now();
        }

        $search = AttendeeEventsSearch::create($validated);
        return response()->json($search, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/attendee-events-searches/{id}",
     *     summary="Get a specific event search",
     *     tags={"Event Searches"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Event search details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Event search not found"
     *     )
     * )
     */
    public function show($id)
    {
        return response()->json(AttendeeEventsSearch::with('attendee')->findOrFail($id));
    }

    /**
     * @OA\Put(
     *     path="/api/attendee-events-searches/{id}",
     *     summary="Update an event search",
     *     tags={"Event Searches"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="search_query", type="string"),
     *             @OA\Property(property="search_date", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Event search updated successfully"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $search = AttendeeEventsSearch::findOrFail($id);
        
        $validated = $request->validate([
            'search_query' => 'sometimes|required|string',
            'search_date' => 'sometimes|required|date'
        ]);

        $search->update($validated);
        return response()->json($search);
    }

    /**
     * @OA\Delete(
     *     path="/api/attendee-events-searches/{id}",
     *     summary="Delete an event search",
     *     tags={"Event Searches"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Event search deleted successfully"
     *     )
     * )
     */
    public function destroy($id)
    {
        $search = AttendeeEventsSearch::findOrFail($id);
        $search->delete();
        return response()->json(null, 204);
    }
} 