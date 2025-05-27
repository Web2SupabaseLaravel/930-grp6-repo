<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;

Route::resource('admins', AdminController::class);
Route::resource('admin_dashboards', AdminDashboardController::class);
