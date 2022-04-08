<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Controllers\Sample;

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

Route::get('/hello', 'App\Http\Controllers\HelloController@index')
    ->middleware(App\Http\Middleware\MyMiddleware::class);
Route::get('/hello/{id}', 'App\Http\Controllers\HelloController@index')
    ->middleware(App\Http\Middleware\MyMiddleware::class);