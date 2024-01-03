<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\imagen;

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

route::get('mensaj', [EmpleadosController::class, 'mensaje'])->name('mensaje');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('saludo/{nombre}/{diasTrabajados}', [EmpleadosController::class, 'saludo']);
route::get('salir', [EmpleadosController::class, 'salir'])->name('salir');
Route::get('/generar-pdf', [EmpleadosController::class, 'generarPDF'])->name('generarPDF');
Route::any('/mostrarImagen', [imagen::class, 'mostrarImagen'])->name('mostrarImagen');
