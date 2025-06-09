<?php

use App\Http\Controllers\HumanController;
use App\Http\Controllers\TicketsAccessController;

Route::get('/admin/humans', [HumanController::class, 'index'])->name('humans.index');
Route::post('/admin/humans', [HumanController::class, 'store'])->name('humans.store');
Route::delete('/admin/humans/{id}', [HumanController::class, 'destroy'])->name('humans.destroy'); // ✅ ضروري هذا السطر
Route::get('/admin/tickets-access', [TicketsAccessController::class, 'index'])->name('tickets-access.index');
Route::post('/admin/tickets-access', [TicketsAccessController::class, 'store'])->name('tickets-access.store');
Route::delete('/admin/tickets-access/{id}', [TicketsAccessController::class, 'destroy'])->name('tickets-access.destroy');
