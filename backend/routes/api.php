<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AdminDashboardController;

Route::get('/admin_dashboards', [AdminDashboardController::class, 'index']);
Route::post('/admin_dashboards', [AdminDashboardController::class, 'store']);
Route::put('/admin_dashboards/{id}', [AdminDashboardController::class, 'update']);
Route::delete('/admin_dashboards/{id}', [AdminDashboardController::class, 'destroy']);
Route::get('/admins', [AdminController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin', [AdminController::class, 'store']);
Route::put('/admin/{id}', [AdminController::class, 'update']);
Route::delete('/admin/{id}', [AdminController::class, 'destroy']);

use Illuminate\Support\Facades\Route;
use App\Models\Admin;

Route::get('/admin', function () {
    return Admin::select('admin_id', 'name','email','password')->get();
});


