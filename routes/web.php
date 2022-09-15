<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PersonController::class, 'index']);
Route::get('/create', [PersonController::class, 'create']);
Route::post('/create', [PersonController::class, 'store'])->name('people.store');

Route::get('/edit/{person}',[PersonController::class, 'edit']);
Route::put('/edit/{person}',[PersonController::class, 'update']);

Route::delete('/delete/{person}', [PersonController::class, 'destroy'])->name('people.delete');
