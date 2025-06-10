<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AttendeeTicketAccess;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class AttendeeTicketAccessController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/attendee-ticket-accesses",
     *     summary="Get all ticket accesses",
     *     tags={"Ticket Accesses"},
     *     @OA\Response(
     *         response=200,
     *         description="List of ticket accesses"
     *     )
     * )
     */
    public function index()
    {
        return response()->json(AttendeeTicketAccess::with('attendee')->get());
    }

    /**
     * @OA\Post(
     *     path="/api/attendee-ticket-accesses",
     *     summary="Create a new ticket access",
     *     tags={"Ticket Accesses"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"attendee_id", "ticket_id"},
     *             @OA\Property(property="attendee_id", type="integer"),
     *             @OA\Property(property="ticket_id", type="string"),
     *             @OA\Property(property="access_date", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Ticket access created successfully"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'attendee_id' => 'required|exists:attendee,id',
            'ticket_id' => 'required|string',
            'access_date' => 'nullable|date'
        ]);

        if (!isset($validated['access_date'])) {
            $validated['access_date'] = now();
        }

        $access = AttendeeTicketAccess::create($validated);
        return response()->json($access, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/attendee-ticket-accesses/{id}",
     *     summary="Get a specific ticket access",
     *     tags={"Ticket Accesses"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ticket access details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ticket access not found"
     *     )
     * )
     */
    public function show($id)
    {
        return response()->json(AttendeeTicketAccess::with('attendee')->findOrFail($id));
    }

    /**
     * @OA\Put(
     *     path="/api/attendee-ticket-accesses/{id}",
     *     summary="Update a ticket access",
     *     tags={"Ticket Accesses"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="ticket_id", type="string"),
     *             @OA\Property(property="access_date", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ticket access updated successfully"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $access = AttendeeTicketAccess::findOrFail($id);
        
        $validated = $request->validate([
            'ticket_id' => 'sometimes|required|string',
            'access_date' => 'sometimes|required|date'
        ]);

        $access->update($validated);
        return response()->json($access);
    }

    /**
     * @OA\Delete(
     *     path="/api/attendee-ticket-accesses/{id}",
     *     summary="Delete a ticket access",
     *     tags={"Ticket Accesses"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Ticket access deleted successfully"
     *     )
     * )
     */
    public function destroy($id)
    {
        $access = AttendeeTicketAccess::findOrFail($id);
        $access->delete();
        return response()->json(null, 204);
    }
} 