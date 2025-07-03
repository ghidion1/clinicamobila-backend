<?php
use App\Http\Controllers\ProgramareController;

Route::post('/programari', [ProgramareController::class, 'store']);

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});
