<?php

use App\Http\Controllers\ClientsController;
use App\Http\Requests\StoreclientsRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Route::apiResource('/', ClientsController::class)->names([
    'index' => 'client.index'
]);

Route::post("/store", [ClientsController::class, "store"])->name("store")->middleware([]);

Route::get('/create', [ClientsController::class, 'create'])->name('client.create');



// Route::get('/', function () {
//     return view('welcome');
// });
