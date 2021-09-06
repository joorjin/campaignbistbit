<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;




Route::any('/', [IndexController::class , 'index']);

Route::any('/add_phone', [UserController::class, 'add_phone']);

// اگر شماره بود و پسورد هم درست بود
Route::any('/go_phone', [UserController::class, 'add_phone'])
