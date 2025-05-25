<?php

namespace App\OpenApi\Schemas;

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
class AttendeeTicketAccessRequest {}

