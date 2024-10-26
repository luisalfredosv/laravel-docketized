<?php

use App\Http\Controllers\ApiWebhookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('webhook/endpoint', [ApiWebhookController::class, 'handle']);
