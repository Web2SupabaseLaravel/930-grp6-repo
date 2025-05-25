<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="Attendee",
 *     title="Attendee",
 *     description="Attendee response model",
 *     @OA\Property(property="id", type="integer", format="int64"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="email", type="string", format="email"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class Attendee {}

