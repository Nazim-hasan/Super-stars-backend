<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserAPIController;

Route::post('/login',[UserAPIController::class,'login']);
Route::post('/register',[UserAPIController::class,'register']);
