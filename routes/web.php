<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/goodBye', [App\Http\Controllers\HomeController::class, 'goodBye'])->name('goodBye');
Route::get('/game/{game}', [App\Http\Controllers\GamesController::class, 'index'])->name('game');
Route::get('/game-lobby', [App\Http\Controllers\GamesController::class, 'gameLobby'])->name('gameLobby');
Route::get('/my-invites', [App\Http\Controllers\GamesController::class, 'myInvites'])->name('myInvites');


Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    echo  "all cleared ...";
    return;

});
