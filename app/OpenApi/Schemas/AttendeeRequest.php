<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="AttendeeRequest",
 *     title="Attendee Request",
 *     description="Attendee model",
 *     @OA\Property(property="id", type="integer", format="int64", description="ID"),
 *     @OA\Property(property="name", type="string", description="Attendee name"),
 *     @OA\Property(property="email", type="string", format="email", description="Attendee email"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation timestamp"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp")
 * )
 */
class AttendeeRequest {}
