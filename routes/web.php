<?php

use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\ConnectionInCommonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReceivedController;
use App\Http\Controllers\SentController;
use App\Http\Controllers\SuggestionController;
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



Route::get('/home',                           [HomeController::class, 'index'])->name('home');

//sent routes
Route::get('/sent',                            [SentController::class, 'index']);
//received routes
Route::get('/received',                        [ReceivedController::class, 'index']);
Route::get('/received/approve/{follow}',       [ReceivedController::class, 'store']);

//suggestion routes
Route::get('/suggestion',                       [SuggestionController::class, 'index']);

//connect routes
Route::get('/connection',                       [ConnectionController::class, 'index']);
Route::post('/connection',                      [ConnectionController::class, 'store']);
Route::delete('/connection/{follow}',           [ConnectionController::class, 'destroy']);
//connectoin in common.
Route::get('/connection-in-common/{user}',      [ConnectionInCommonController::class, 'index']);
