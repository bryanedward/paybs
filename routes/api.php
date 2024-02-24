<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\StripeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'pay'], function () {
    Route::get("/payment_flow", [StripeController::class, "create"]);
});

Route::apiResource('clientes', ClientsController::class);
