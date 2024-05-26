<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

Route::get('/', [ServiceController::class, 'index']);

Route::get('/services/create', [ServiceController::class, 'create'])->middleware('auth');

Route::post('/services', [ServiceController::class, 'store']);

Route::get('/services/{id}', [ServiceController::class, 'show']);

Route::get('/dashboard', [ServiceController::class, 'dashboard'])->middleware('auth');

Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->middleware('auth');

Route::get('/services/edit/{id}', [ServiceController::class, 'edit'])->middleware('auth');

Route::put('/services/update/{id}', [ServiceController::class, 'update'])->middleware('auth');

Route::post('/services/join/{id}', [ServiceController::class, 'joinService'])->middleware('auth');


