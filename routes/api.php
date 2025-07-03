<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramareController;


Route::get('/programari', [ProgramareController::class, 'index']);
Route::post('/programari', [ProgramareController::class, 'store']);
