<?php

use App\Http\Controllers\CalculationController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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
    return Inertia::render('CalculationBudget');
})->name('index');

Route::post('api/calculate', [CalculationController::class, 'getCalculation'])->name('calculation');

