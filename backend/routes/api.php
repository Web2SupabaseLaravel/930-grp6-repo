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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API Resource routes for CRUD operations
Route::apiResource('attendees', AttendeeController::class);
Route::apiResource('attendee-events-searches', AttendeeEventsSearchController::class);
Route::apiResource('attendee-ticket-accesses', AttendeeTicketAccessController::class);

// Event Routes
Route::prefix('events')->group(function () {
    Route::get('/', [App\Http\Controllers\API\EventController::class, 'index']);
    Route::post('/', [App\Http\Controllers\API\EventController::class, 'store']);
    Route::get('/{event}', [App\Http\Controllers\API\EventController::class, 'show']);
    Route::put('/{event}', [App\Http\Controllers\API\EventController::class, 'update']);
    Route::delete('/{event}', [App\Http\Controllers\API\EventController::class, 'destroy']);
});

// User Routes
Route::prefix('users')->group(function () {
    Route::get('/profile', [App\Http\Controllers\API\UserController::class, 'profile']);
    Route::put('/profile', [App\Http\Controllers\API\UserController::class, 'updateProfile']);
});

// Authentication Routes
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout'])->middleware('auth:sanctum'); 