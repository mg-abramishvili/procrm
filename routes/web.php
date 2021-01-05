<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\DocumentController;

Route::resource('/projects', ProjectController::class)->middleware(['auth']);

Route::resource('/finances', FinanceController::class)->middleware(['auth']);

require __DIR__.'/auth.php';