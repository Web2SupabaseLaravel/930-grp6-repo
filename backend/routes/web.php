<?php
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AdminDashboardController;

Route::resource('admins', AdminController::class);
Route::resource('admin_dashboards', AdminDashboardController::class);

