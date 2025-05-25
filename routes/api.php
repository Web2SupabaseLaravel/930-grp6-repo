<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
 use App\Http\Controllers\HumanController;

Route::apiResource('events',EventController::class);

Route::apiResource('human',HumanController::class);
