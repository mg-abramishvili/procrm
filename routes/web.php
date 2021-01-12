<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectConfigurationController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::resource('/projects', ProjectController::class)->middleware(['auth']);
Route::resource('/projects_conf', ProjectConfigurationController::class)->middleware(['auth']);

Route::resource('/finances', FinanceController::class)->middleware(['auth']);

Route::resource('/clients', ClientController::class)->middleware(['auth']);

Route::resource('/users', UserController::class)->middleware(['auth']);

require __DIR__.'/auth.php';