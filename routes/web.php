<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('/login', 'SessionsController@authenticate');
Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::post('/prediction/predict', 'FlaskController@sendImage');
    Route::get('/test', 'FlaskController@predict');

    Route::get('/prediction', 'PagesController@prediction');
    Route::get('/model/results', 'PagesController@results');

    Route::get('/logout', 'SessionsController@logout');

    Route::view('/executionTime', 'models.execution_time');
    Route::view('/trainTime', 'models.efficientnet_cm');
    Route::view('/model/training', 'prediction.train');
});
