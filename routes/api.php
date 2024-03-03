<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\StripeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// rutas del adminisitrador de mi banco
Route::get("/", [StripeController::class, "index"])->name("admin");
Route::get("/pagos", function () {
    return view("admin.pagos");
});

Route::group(['as' => 'pay'], function () {
    // Route::post("/payment_flow", [StripeController::class, "create"]);
    Route::post("/customer", [StripeController::class, "store"]);
});

Route::apiResource('clientes', ClientsController::class);
