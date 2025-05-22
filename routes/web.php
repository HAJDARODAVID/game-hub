<?php

use App\Http\Controllers\DevController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/goodBye', [App\Http\Controllers\HomeController::class, 'goodBye'])->name('goodBye');
Route::get('/game/{game}', [App\Http\Controllers\GamesController::class, 'index'])->name('game');
Route::get('/game-lobby', [App\Http\Controllers\GamesController::class, 'gameLobby'])->name('gameLobby');
Route::get('/my-invites', [App\Http\Controllers\GamesController::class, 'myInvites'])->name('myInvites');
Route::get('/game-controller/{instance}', [App\Http\Controllers\GamesController::class, 'gameController'])->name('gameController');

Route::get('/game-controller/{instance}', [App\Http\Controllers\GamesController::class, 'gameController'])->name('gameController');

Route::controller(DevController::class)
        ->prefix('/dev')
        ->group(function(){
                Route::get('drink-board', 'drinkopolyBoard');
        });

Route::get('/clear', [App\Http\Controllers\CustomCommands::class, 'clear']);
Route::get('/clear2', function(){
        Artisan::call('cache:clear');
        Artisan::call('route:cache');
        Artisan::call('view:clear');
        Artisan::call('config:cache');
        echo 'cleared..';
        return;
});
