    <?php

    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AdminDashboardController;
    use App\Http\Controllers\AdminHumanManageController;
    use App\Http\Controllers\AdminTicketAccessController;
    use App\Http\Controllers\AttendeeController;
    use App\Http\Controllers\AttendeeEventsSearchController;
    use App\Http\Controllers\AttendeeTicketAccessController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\EventController;
    use App\Http\Controllers\HumanController;
    use App\Http\Controllers\OrganizerController;
    use App\Http\Controllers\OrganizerDashboardController;
    use App\Http\Controllers\TicketController;



    Route::post('/login', [HumanController::class, 'login']);
    Route::apiResource('human', HumanController::class);
    Route::apiResource('events',EventController::class);
    Route::apiResource('ticket',TicketController::class);
    Route::apiResource('admin',AdminController::class);
    Route::apiResource('admin_dashboard',AdminDashboardController::class);
    Route::apiResource('admin_human_manage',AdminHumanManageController::class);
    Route::apiResource('admin_ticket_access',AdminTicketAccessController::class);
    Route::apiResource('organizer',OrganizerController::class);
    Route::apiResource('organizer_dashboard',OrganizerDashboardController::class);
    Route::apiResource('attendee',AttendeeController::class);
    Route::apiResource('attendee_events_search',AttendeeEventsSearchController::class);
    Route::apiResource('attendee_ticket_access',AttendeeTicketAccessController::class);

