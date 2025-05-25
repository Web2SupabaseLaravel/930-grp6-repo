<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="AttendeeEventsSearchRequest",
 *     title="Attendee Event Search Request",
 *     description="Attendee event search request body",
 *     required={"attendee_id", "search_query"},
 *     @OA\Property(property="attendee_id", type="integer", format="int64", description="ID of the attendee", example=1),
 *     @OA\Property(property="search_query", type="string", description="Search query", example="Laravel conference")
 * )
 */
class AttendeeEventsSearchRequest {}
