<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::post('/prediction/predict', 'FlaskController@sendImage');
Route::get('/test', 'FlaskController@predict');

Route::get('/prediction', 'PagesController@prediction');
Route::get('/model/results', 'PagesController@results');

Route::view('/executionTime', 'models.execution_time');
Route::view('/trainTime', 'models.efficientnet_cm');
Route::view('/model/training', 'prediction.train');
