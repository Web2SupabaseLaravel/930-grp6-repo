<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="AttendeeEventsSearchRequest",  
 *     title="Attendee Event Search",
 *     description="Attendee event search model",
 *     @OA\Property(property="id", type="integer", format="int64", description="ID"),
 *     @OA\Property(property="attendee_id", type="integer", format="int64", description="ID of the attendee who searched"),
 *     @OA\Property(property="search_query", type="string", description="The search query string"),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation timestamp"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp"),
 *     @OA\Property(property="attendee", ref="#/components/schemas/Attendee", description="The attendee who made the search")
 * )
 */
class AttendeeEventsSearchRequest {}
