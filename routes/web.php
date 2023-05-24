<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewMediadorController;
use App\Http\Controllers\MediadorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/mediadores', [ViewMediadorController::class, 'index'])->name('mediador.index');

Route::get('/mediador', function (MediadorController $mediador) {
    $mediadores = $mediador->show();
    return view('mediador.index', compact('mediadores'));
});
