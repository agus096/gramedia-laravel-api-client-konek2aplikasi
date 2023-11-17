<?php

use App\Http\Controllers\ambildataController;
use Illuminate\Support\Facades\Route;

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


//route ini mengarah ke ambildataController function ambil data yang dimana mengarah ke urlAPi
Route::get('/', [ambildataController::class , 'ambildata']);

//route ini mengarah ke ambildataController function update
Route::put('/data/{id}', [ambildataController::class , 'update'])->name('data.update');
