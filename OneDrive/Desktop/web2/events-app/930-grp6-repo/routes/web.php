<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\OrganizerDashboardController;

Route::get('/', function () {
    return view('welcome');
});

// مسارات التذاكر
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');
Route::post('/tickets/{id}/activate', [TicketController::class, 'activate'])->name('tickets.activate');
Route::post('/tickets/{id}/deactivate', [TicketController::class, 'deactivate'])->name('tickets.deactivate');

// مسارات المنظمين
Route::resource('organizers', OrganizerController::class);

// مسارات لوحة التحكم
Route::resource('dashboards', OrganizerDashboardController::class);