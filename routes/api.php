<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EntityApiController;

Route::match(['get', 'post'], '/entity', [EntityApiController::class, 'handleEntity']);
Route::get('/apidata', [EntityApiController::class, 'index'])->name('api.index');
