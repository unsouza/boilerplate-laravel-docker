<?php

use Core\User\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/user', [UserController::class, 'store']);