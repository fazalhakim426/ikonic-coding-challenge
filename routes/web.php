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



Route::get('/home', [HomeController::class, 'index'])->name('home');

//sent routes
Route::get('/sent', [SentController::class, 'index']);
Route::delete('/withdraw/{follow}', [SentController::class, 'destroy']);
//received routes
Route::get('/received', [ReceivedController::class, 'index']);
Route::get('/accept/{follow}', [ReceivedController::class, 'store']);

//suggestion routes
Route::get('/suggestion', [SuggestionController::class, 'index']);
Route::post('/connect', [SuggestionController::class, 'store'])->name('connect');

//connect routes
Route::get('/connection', [ConnectionController::class, 'index']);
Route::get('/connection-in-common/{user}', [ConnectionInCommonController::class, 'index']);
