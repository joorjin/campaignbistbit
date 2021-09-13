<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\StartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\SetupController;

Route::any('/', [IndexController::class , 'index']);

Route::any('/add_phone', [UserController::class, 'add_phone']);

Route::any('/go_phone', [UserController::class, 'add_phone']);



//  انتخواب جایزه
Route::any('/checkLicense', [QueueController::class, 'checkLicense']);
Route::any('/selectAward', [QueueController::class, 'selectAward']);

// start
Route::view('/start', 'start');
Route::any('/start_challenge', [StartController::class, 'start']);


Route::any('/gitpull2903', [SetupController::class, 'setup']);
