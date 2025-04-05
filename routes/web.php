<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Templates/registration');
});

Route::get('/register', function () {
    return view('Templates/registration');
});
Route::get('/type', function () {
    return view('Templates.TypeJS');
});

/* Flast Method */
Route::get('flash-method', [Controller::class, 'flashMethod']);

/* Flast data */
Route::get('flash-data', [Controller::class, 'flashData']);
Route::get('another-flash', [Controller::class, 'anotherFlash']);

/* CRUD Operations */
Route::resource('crud', App\Http\Controllers\CrudOperationsController::class);
