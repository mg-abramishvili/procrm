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

Route::get('projects', 'App\Http\Controllers\ProjectController@index')->middleware(['auth']);
Route::group(['prefix' => 'project'], function () {
    Route::get('create', 'App\Http\Controllers\ProjectController@create')->middleware(['auth']);
    Route::post('created', 'App\Http\Controllers\ProjectController@store')->middleware(['auth']);
    Route::get('{id}/edit', 'App\Http\Controllers\ProjectController@edit')->middleware(['auth']);
    Route::put('{id}', 'App\Http\Controllers\ProjectController@update')->middleware(['auth']);
    Route::get('{project}', 'App\Http\Controllers\ProjectController@show')->middleware(['auth']);
    Route::get('{id}/delete', 'App\Http\Controllers\ProjectController@delete')->middleware(['auth']);
});

Route::resource('/projects_conf', ProjectConfigurationController::class)->middleware(['auth']);

Route::resource('/finances', FinanceController::class)->middleware(['auth']);
Route::get('/finances-calendar/{year}', 'App\Http\Controllers\FinanceController@calendar')->middleware(['auth']);

Route::resource('/documents', DocumentController::class)->middleware(['auth']);

Route::resource('/clients', ClientController::class)->middleware(['auth']);

Route::resource('/leads', LeadController::class)->middleware(['auth']);

Route::resource('/users', UserController::class)->middleware(['auth']);

require __DIR__.'/auth.php';