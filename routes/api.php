<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\DocumentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/auth', function () {
    return true;
});

Route::post('login', 'App\Http\Controllers\LoginController@login');

Route::get('projects', 'App\Http\Controllers\ProjectController@index')->middleware('auth:sanctum')->middleware('throttle:60,1');
Route::group(['prefix' => 'project'], function () {
    Route::post('add', 'App\Http\Controllers\ProjectController@add')->middleware('throttle:60,1');
    Route::get('edit/{id}', 'App\Http\Controllers\ProjectController@edit')->middleware('throttle:60,1');
    Route::post('update/{id}', 'App\Http\Controllers\ProjectController@update')->middleware('throttle:60,1');
    Route::get('view/{id}', 'App\Http\Controllers\ProjectController@view')->middleware('throttle:60,1');
    Route::delete('delete/{id}', 'App\Http\Controllers\ProjectController@delete')->middleware('throttle:60,1');
});

Route::get('finances', 'App\Http\Controllers\FinanceController@index')->middleware('auth:sanctum')->middleware('throttle:60,1');
Route::group(['prefix' => 'finance'], function () {
    Route::post('add', 'App\Http\Controllers\FinanceController@add')->middleware('throttle:60,1');
    Route::get('edit/{id}', 'App\Http\Controllers\FinanceController@edit')->middleware('throttle:60,1');
    Route::post('update/{id}', 'App\Http\Controllers\FinanceController@update')->middleware('throttle:60,1');
    Route::get('view/{id}', 'App\Http\Controllers\FinanceController@view')->middleware('throttle:60,1');
    Route::delete('delete/{id}', 'App\Http\Controllers\FinanceController@delete')->middleware('throttle:60,1');
});

Route::get('tasks', 'App\Http\Controllers\TaskController@index')->middleware('auth:sanctum');
Route::group(['prefix' => 'task'], function () {
    Route::post('add', 'App\Http\Controllers\TaskController@add')->middleware('throttle:60,1');
    Route::get('edit/{id}', 'App\Http\Controllers\TaskController@edit')->middleware('throttle:60,1');
    Route::post('update/{id}', 'App\Http\Controllers\TaskController@update')->middleware('throttle:60,1');
    Route::delete('delete/{id}', 'App\Http\Controllers\TaskController@delete')->middleware('throttle:60,1');
});

Route::get('leads', 'App\Http\Controllers\LeadController@index')->middleware('auth:sanctum')->middleware('throttle:60,1');
Route::group(['prefix' => 'lead'], function () {
    Route::post('add', 'App\Http\Controllers\LeadController@add')->middleware('throttle:60,1');
    Route::get('edit/{id}', 'App\Http\Controllers\LeadController@edit')->middleware('throttle:60,1');
    Route::post('update/{id}', 'App\Http\Controllers\LeadController@update')->middleware('throttle:60,1');
    Route::delete('delete/{id}', 'App\Http\Controllers\LeadController@delete')->middleware('throttle:60,1');
});

Route::get('documents', 'App\Http\Controllers\DocumentController@index')->middleware('auth:sanctum')->middleware('throttle:60,1');
Route::group(['prefix' => 'document'], function () {
    Route::post('add', 'App\Http\Controllers\DocumentController@add')->middleware('throttle:60,1');
    Route::get('edit/{id}', 'App\Http\Controllers\DocumentController@edit')->middleware('throttle:60,1');
    Route::post('update/{id}', 'App\Http\Controllers\DocumentController@update')->middleware('throttle:60,1');
    Route::get('view/{id}', 'App\Http\Controllers\DocumentController@view')->middleware('throttle:60,1');
    Route::delete('delete/{id}', 'App\Http\Controllers\DocumentController@delete')->middleware('throttle:60,1');
});