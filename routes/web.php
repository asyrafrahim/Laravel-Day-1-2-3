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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'trainings',
    'as' => 'training:'
], function() {
    Route::get('/', 'TrainingController@index')->name('index');
    Route::get('/create', 'TrainingController@create')->name('create');
    Route::post('/create', 'TrainingController@store')->name('store');
    Route::get('/{training}', 'TrainingController@show')->name('show');
    Route::get('/{training}/edit', 'TrainingController@edit')->name('edit');
    Route::post('/{training}/edit', 'TrainingController@update')->name('update');
    Route::get('/{training}/delete', 'TrainingController@delete')->name('delete');
});