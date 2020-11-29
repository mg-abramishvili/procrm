<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\DocumentController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('projects', 'App\Http\Controllers\ProjectController@index');
Route::group(['prefix' => 'project'], function () {
    Route::post('add', 'App\Http\Controllers\ProjectController@add');
    Route::get('edit/{id}', 'App\Http\Controllers\ProjectController@edit');
    Route::post('update/{id}', 'App\Http\Controllers\ProjectController@update');
    Route::get('view/{id}', 'App\Http\Controllers\ProjectController@view');
    Route::delete('delete/{id}', 'App\Http\Controllers\ProjectController@delete');
});

Route::get('finances', 'App\Http\Controllers\FinanceController@index');
Route::group(['prefix' => 'finance'], function () {
    Route::post('add', 'App\Http\Controllers\FinanceController@add');
    Route::get('edit/{id}', 'App\Http\Controllers\FinanceController@edit');
    Route::post('update/{id}', 'App\Http\Controllers\FinanceController@update');
    Route::get('view/{id}', 'App\Http\Controllers\FinanceController@view');
    Route::delete('delete/{id}', 'App\Http\Controllers\FinanceController@delete');
});

Route::get('documents', 'App\Http\Controllers\DocumentController@index');
Route::group(['prefix' => 'document'], function () {
    Route::post('add', 'App\Http\Controllers\DocumentController@add');
    Route::get('edit/{id}', 'App\Http\Controllers\DocumentController@edit');
    Route::post('update/{id}', 'App\Http\Controllers\DocumentController@update');
    Route::get('view/{id}', 'App\Http\Controllers\DocumentController@view');
    Route::delete('delete/{id}', 'App\Http\Controllers\DocumentController@delete');
});