<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AttendeeTicketAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Tag(name="Attendee Ticket Accesses")
 */
class AttendeeTicketAccessController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/attendee-ticket-accesses",
     *     tags={"Attendee Ticket Accesses"},
     *     summary="Get list of attendee ticket accesses",
     *     description="Returns a paginated list of ticket access records for attendees",
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
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/AttendeeTicketAccess")),
     *             @OA\Property(property="links", type="object"),
     *             @OA\Property(property="meta", type="object")
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        $query = AttendeeTicketAccess::query();
        if ($request->has("attendee_id")) {
            $query->where("attendee_id", $request->input("attendee_id"));
        }
        return $query->with("attendee")->paginate();
    }

    /**
     * @OA\Post(
     *     path="/api/attendee-ticket-accesses",
     *     tags={"Attendee Ticket Accesses"},
     *     summary="Create a new attendee ticket access record",
     *     description="Adds a new ticket access record for an attendee",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AttendeeTicketAccessRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Ticket access record created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/AttendeeTicketAccess")
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
            "ticket_code" => "required|string|max:255|unique:attendee_ticket_accesses",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $ticketAccess = AttendeeTicketAccess::create($validator->validated());
        return response()->json($ticketAccess->load("attendee"), 201);
    }

    /**
     * @OA\Get(
     *     path="/api/attendee-ticket-accesses/{attendeeTicketAccess}",
     *     tags={"Attendee Ticket Accesses"},
     *     summary="Get specific ticket access record information",
     *     description="Returns ticket access data by ID",
     *     @OA\Parameter(
     *         name="attendeeTicketAccess",
     *         in="path",
     *         description="ID of ticket access record to return",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/AttendeeTicketAccess")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ticket access record not found"
     *     )
     * )
     */
    public function show(AttendeeTicketAccess $attendeeTicketAccess)
    {
        return response()->json($attendeeTicketAccess->load("attendee"));
    }

    /**
     * @OA\Put(
     *     path="/api/attendee-ticket-accesses/{attendeeTicketAccess}",
     *     tags={"Attendee Ticket Accesses"},
     *     summary="Update an existing ticket access record",
     *     description="Updates ticket access data by ID",
     *     @OA\Parameter(
     *         name="attendeeTicketAccess",
     *         in="path",
     *         description="ID of ticket access record to update",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AttendeeTicketAccessRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ticket access record updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/AttendeeTicketAccess")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ticket access record not found"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/api/attendee-ticket-accesses/{attendeeTicketAccess}",
     *     tags={"Attendee Ticket Accesses"},
     *     summary="Delete a ticket access record",
     *     description="Deletes a ticket access record by ID",
     *     @OA\Parameter(
     *         name="attendeeTicketAccess",
     *         in="path",
     *         description="ID of ticket access record to delete",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Ticket access record deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ticket access record not found"
     *     )
     * )
     */
    public function destroy(AttendeeTicketAccess $attendeeTicketAccess)
    {
        $attendeeTicketAccess->delete();
        return response()->json(null, 204);
    }
}

/**
 * @OA\Schema(
 *     schema="AttendeeTicketAccess",
 *     title="Attendee Ticket Access",
 *     description="Attendee ticket access model",
 *     @OA\Property(property="id", type="integer", format="int64", description="ID"),
 *     @OA\Property(property="attendee_id", type="integer", format="int64", description="ID of the attendee"),
 *     @OA\Property(property="ticket_code", type="string", description="Unique ticket code"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation timestamp"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp"),
 *     @OA\Property(property="attendee", ref="#/components/schemas/Attendee", description="The attendee associated with the ticket")
 * )
 */

 /**
 * @OA\Schema(
 *     schema="AttendeeTicketAccessRequest",
 *     title="Attendee Ticket Access Request",
 *     description="Attendee ticket access request body",
 *     required={"attendee_id", "ticket_code"},
 *     @OA\Property(property="attendee_id", type="integer", format="int64", description="ID of the attendee", example=1),
 *     @OA\Property(property="ticket_code", type="string", description="Unique ticket code", example="TKT12345XYZ")
 * )
 */

