<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index',[
        //'name' => 'Zeljko'
    ]);
});

Route::get('/zeka', function () {
    return 'Hello Zeka';
});

//Dodavanje dinamickih djelova na samom url-u
Route::get('/greet/{name}', function($name) {
    return 'Helo' . $name . '!';
});


