<?php

use App\Http\Controllers\CustomerController;
use App\Http\Requests\StoreclientsRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Route::apiResource('/', CustomerController::class)->names([
    'index' => 'client.index'
]);

Route::get('create', [CustomerController::class, 'create'])->name('client.create');
Route::post("store", [CustomerController::class, "store"])->name("store")->middleware([]);
Route::get('edit/{clients}', [CustomerController::class, 'edit'])->name('client.edit');
Route::put("update/{clients}", [CustomerController::class, "update"])->name("client.update");
Route::get("show/{clients}", [CustomerController::class, "show"])->name("client.show");
Route::delete("destroy/{clients}", [CustomerController::class, "destroy"])->name("client.destroy");
