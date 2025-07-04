<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/programari', [App\Http\Controllers\ProgramareController::class, 'lista']);
