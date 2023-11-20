<?php

use App\Http\Controllers\LocationController;
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

Route::get('/', function () {
    return redirect('/locations');
});

Route::get('/locations', [LocationController::class, 'index'])->name('location.index');
Route::get('/locations/{id}', [LocationController::class, 'getNearestLocation'])->name('location.nearest');
