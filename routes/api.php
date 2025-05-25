<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AttendeeController;
use App\Http\Controllers\Api\AttendeeEventsSearchController;
use App\Http\Controllers\Api\AttendeeTicketAccessController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
    return $request->user();
});

// API Resource routes for CRUD operations
Route::apiResource("attendees", AttendeeController::class);
Route::apiResource("attendee-events-searches", AttendeeEventsSearchController::class);
Route::apiResource("attendee-ticket-accesses", AttendeeTicketAccessController::class);


