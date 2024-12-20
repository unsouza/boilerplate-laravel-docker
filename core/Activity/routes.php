<?php

use Core\Activity\ActivityController;
use Illuminate\Support\Facades\Route;

Route::post('/activity', [ActivityController::class, 'store']);
