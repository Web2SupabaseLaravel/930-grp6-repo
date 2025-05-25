<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Attendee API Documentation",
 *      description="API documentation for the Attendee project using Laravel and Supabase",
 *      @OA\Contact(
 *          email="support@example.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Demo API Server"
 * )

 *
 * @OA\Tag(
 *     name="Attendees",
 *     description="API Endpoints for Attendees"
 * )
 * @OA\Tag(
 *     name="Attendee Events Searches",
 *     description="API Endpoints for Attendee Event Searches"
 * )
 * @OA\Tag(
 *     name="Attendee Ticket Accesses",
 *     description="API Endpoints for Attendee Ticket Accesses"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

