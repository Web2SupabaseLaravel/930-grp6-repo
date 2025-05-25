<?php

namespace App\OpenApi\Schemas;

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
class AttendeeRequest {}

