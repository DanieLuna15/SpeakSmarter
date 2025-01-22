<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

//rutas no auntenticadas
Route::get('/', [DashboardController::class, 'index']);

//rutas auntenticadas
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});




