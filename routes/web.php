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

Route::get('projects', 'App\Http\Controllers\ProjectController@index');
Route::group(['prefix' => 'project'], function () {
    Route::get('create', 'App\Http\Controllers\ProjectController@create');
    Route::post('created', 'App\Http\Controllers\ProjectController@store');
    Route::get('{id}/edit', 'App\Http\Controllers\ProjectController@edit');
    Route::put('{id}', 'App\Http\Controllers\ProjectController@update');
    Route::get('{project}', 'App\Http\Controllers\ProjectController@show');
    Route::get('{id}/delete', 'App\Http\Controllers\ProjectController@delete');
});

Route::resource('/projects_conf', ProjectConfigurationController::class)->middleware(['auth']);

Route::resource('/finances', FinanceController::class)->middleware(['auth']);

Route::resource('/documents', DocumentController::class)->middleware(['auth']);

Route::resource('/clients', ClientController::class)->middleware(['auth']);

Route::resource('/leads', LeadController::class)->middleware(['auth']);

Route::resource('/users', UserController::class)->middleware(['auth']);

require __DIR__.'/auth.php';