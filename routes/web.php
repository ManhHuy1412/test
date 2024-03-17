<?php

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

Route::match(['GET', 'POST'], '/', [App\Http\Controllers\OrderController::class, 'step1'])->name('step1');

Route::match(['GET', 'POST'], '/step2', [App\Http\Controllers\OrderController::class, 'step2'])->name('step2');
Route::match(['GET', 'POST'], '/step3', [App\Http\Controllers\OrderController::class, 'step3'])->name('step3');
Route::get('/review',[App\Http\Controllers\OrderController::class,'review'])->name('review');