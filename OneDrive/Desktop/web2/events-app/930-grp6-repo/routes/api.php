use App\Http\Controllers\TicketController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\OrganizerDashboardController;

Route::apiResource('tickets', TicketController::class);
Route::post('tickets/{id}/activate', [TicketController::class, 'activate']);
Route::post('tickets/{id}/deactivate', [TicketController::class, 'deactivate']);

Route::apiResource('organizers', OrganizerController::class);
Route::apiResource('dashboards', OrganizerDashboardController::class);
