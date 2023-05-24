<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediadorController;
use App\Http\Controllers\SuperHeroeController;
use App\Http\Controllers\SorteoController;
use App\Http\Controllers\DriverController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/drivers', [DriverController::class, 'drivers']);
Route::get('/mediador/{id}', [MediadorController::class, 'get']);
Route::get('/mediador', [MediadorController::class, 'show']);
Route::post('/mediador', [MediadorController::class, 'post']);
Route::get('/super-heroe/search/{name}', [SuperHeroeController::class, 'search']);
Route::get('/super-heroe/{id}', [SuperHeroeController::class, 'get']);
Route::post('/sorteo', [SorteoController::class, 'sorteo']);
