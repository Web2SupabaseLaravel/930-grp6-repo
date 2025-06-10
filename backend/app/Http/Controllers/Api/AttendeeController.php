<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendee;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="Attendee Management API",
 *     version="1.0.0",
 *     description="API endpoints for managing attendees and their related data"
 * )
 */
class AttendeeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/attendees",
     *     summary="Get all attendees",
     *     tags={"Attendees"},
     *     @OA\Response(
     *         response=200,
     *         description="List of attendees",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="human_id", type="integer"),
     *                 @OA\Property(property="created_at", type="string", format="date-time"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time")
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $attendees = Attendee::with(['human', 'eventSearches', 'ticketAccesses'])
            ->paginate(15);

        return response()->json([
            'status' => 'success',
            'data' => $attendees
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/attendees",
     *     summary="Create a new attendee",
     *     tags={"Attendees"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Attendee created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="created_at", type="string", format="date-time"),
     *             @OA\Property(property="updated_at", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'human_id' => 'required|integer|exists:human,id'
        ]);

        $attendee = Attendee::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => $attendee->load(['human', 'eventSearches', 'ticketAccesses'])
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/attendees/{id}",
     *     summary="Get a specific attendee",
     *     tags={"Attendees"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Attendee ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Attendee details",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="created_at", type="string", format="date-time"),
     *             @OA\Property(property="updated_at", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Attendee not found"
     *     )
     * )
     */
    public function show(string $id)
    {
        $attendee = Attendee::with(['human', 'eventSearches', 'ticketAccesses'])
            ->findOrFail($id);
        
        return response()->json([
            'status' => 'success',
            'data' => $attendee
        ]);
    }

    /**
     * @OA\Put(
     *     path="/api/attendees/{id}",
     *     summary="Update an attendee",
     *     tags={"Attendees"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Attendee ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Attendee updated successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Attendee not found"
     *     )
     * )
     */
    public function update(Request $request, string $id)
    {
        $attendee = Attendee::findOrFail($id);
        
        $validated = $request->validate([
            'human_id' => 'required|integer|exists:human,id'
        ]);

        $attendee->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => $attendee->load(['human', 'eventSearches', 'ticketAccesses'])
        ]);
    }

    /**
     * @OA\Delete(
     *     path="/api/attendees/{id}",
     *     summary="Delete an attendee",
     *     tags={"Attendees"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Attendee ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Attendee deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Attendee not found"
     *     )
     * )
     */
    public function destroy(string $id)
    {
        $attendee = Attendee::findOrFail($id);
        $attendee->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Attendee deleted successfully'
        ]);
    }
} 