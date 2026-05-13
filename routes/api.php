<?php

use App\Http\Controllers\Api\IncidentApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('incidents')->group(function () {
    Route::get('/', [IncidentApiController::class, 'index']);
    Route::post('/store', [IncidentApiController::class, 'store']);
});
