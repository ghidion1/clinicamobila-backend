<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramareController;

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

Route::post('/programari', [ProgramareController::class, 'store']);
