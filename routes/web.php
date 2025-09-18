<?php

use App\Http\Controllers\FinanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FinanceController::class, 'index']);
Route::get('/finance/create', [FinanceController::class, 'create'])->name('finance.create');
Route::post('/finance/store', [FinanceController::class, 'store']);
