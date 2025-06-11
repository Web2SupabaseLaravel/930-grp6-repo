<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HumanController;

Route::get('/human-access', [HumanController::class, 'indexAccess']);
Route::get('/admins', [HumanController::class, 'getAdmins']);
Route::get('/humans-list', [HumanController::class, 'getHumans']);

Route::get('/human-access', [HumanController::class, 'indexAccess']);
Route::get('/admins', [HumanController::class, 'getAdmins']);
Route::get('/humans-list', [HumanController::class, 'getHumans']);
Route::get('/human', [HumanController::class, 'index']);
Route::post('/human', [HumanController::class, 'store']);     //  أو
Route::delete('/human/{id}', [HumanController::class, 'destroy']); // حذف
