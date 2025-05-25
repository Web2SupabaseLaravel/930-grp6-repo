<?php


use App\Http\Controllers\AdminAccessController;

Route::get('/admin/humans', [AdminAccessController::class, 'humansIndex']);
Route::get('/admin/tickets', [AdminAccessController::class, 'ticketsIndex']);

Route::post('/admin/humans', [AdminAccessController::class, 'addHumanAccess']);
Route::post('/admin/tickets', [AdminAccessController::class, 'addTicketAccess']);
