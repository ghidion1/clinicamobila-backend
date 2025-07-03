<?php
use App\Http\Controllers\ProgramareController;

Route::post('/programari', [ProgramareController::class, 'store']);

