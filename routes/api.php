<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('projects', 'App\Http\Controllers\ProjectController@index');
Route::group(['prefix' => 'project'], function () {
    Route::post('add', 'App\Http\Controllers\ProjectController@add');
    Route::get('edit/{id}', 'App\Http\Controllers\ProjectController@edit');
    Route::post('update/{id}', 'App\Http\Controllers\ProjectController@update');
    Route::delete('delete/{id}', 'App\Http\Controllers\ProjectController@delete');
});