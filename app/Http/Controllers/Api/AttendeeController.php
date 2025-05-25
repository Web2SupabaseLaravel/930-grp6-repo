<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Tag(name="Attendees")
 */
class AttendeeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/attendees",
     *     tags={"Attendees"},
     *     summary="Get list of attendees",
     *     description="Returns a paginated list of attendees",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page number",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Attendee")),
     *             @OA\Property(property="links", type="object"),
     *             @OA\Property(property="meta", type="object")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return Attendee::paginate();
    }

    /**
     * @OA\Post(
     *     path="/api/attendees",
     *     tags={"Attendees"},
     *     summary="Create a new attendee",
     *     description="Adds a new attendee to the database",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AttendeeRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Attendee created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Attendee")
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
            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:attendees",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $attendee = Attendee::create($validator->validated());
        return response()->json($attendee, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/attendees/{attendee}",
     *     tags={"Attendees"},
     *     summary="Get attendee information",
     *     description="Returns attendee data by ID",
     *     @OA\Parameter(
     *         name="attendee",
     *         in="path",
     *         description="ID of attendee to return",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Attendee")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Attendee not found"
     *     )
     * )
     */
    public function show(Attendee $attendee)
    {
        return response()->json($attendee);
    }

    /**
     * @OA\Put(
     *     path="/api/attendees/{attendee}",
     *     tags={"Attendees"},
     *     summary="Update an existing attendee",
     *     description="Updates attendee data by ID",
     *     @OA\Parameter(
     *         name="attendee",
     *         in="path",
     *         description="ID of attendee to update",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AttendeeRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Attendee updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Attendee")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Attendee not found"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/api/attendees/{attendee}",
     *     tags={"Attendees"},
     *     summary="Delete an attendee",
     *     description="Deletes an attendee by ID",
     *     @OA\Parameter(
     *         name="attendee",
     *         in="path",
     *         description="ID of attendee to delete",
     *         required=true,
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
    public function destroy(Attendee $attendee)
    {
        $attendee->delete();
        return response()->json(null, 204);
    }
}

/**
 * @OA\Schema(
 *     schema="Attendee",
 *     title="Attendee",
 *     description="Attendee model",
 *     @OA\Property(property="id", type="integer", format="int64", description="ID"),
 *     @OA\Property(property="name", type="string", description="Attendee name"),
 *     @OA\Property(property="email", type="string", format="email", description="Attendee email"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation timestamp"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp")
 * )
 */

 /**
 * @OA\Schema(
 *     schema="AttendeeRequest",
 *     title="Attendee Request",
 *     description="Attendee request body",
 *     required={"name", "email"},
 *     @OA\Property(property="name", type="string", description="Attendee name", example="John Doe"),
 *     @OA\Property(property="email", type="string", format="email", description="Attendee email", example="john.doe@example.com")
 * )
 */

