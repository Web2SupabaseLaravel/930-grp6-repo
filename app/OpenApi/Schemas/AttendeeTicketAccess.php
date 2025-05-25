<?php

namespace App\OpenApi\Schemas;

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
class AttendeeTicketAccess {}

