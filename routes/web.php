<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*')->middleware('auth');

Route::post('documents/file/{method}','App\Http\Controllers\DocumentController@file');