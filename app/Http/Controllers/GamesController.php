<?php

namespace App\Http\Controllers;

use App\Services\Games\GameService;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index($game){
        $gameService = new GameService($game);
        if(!$gameService->isActive()){
            return redirect()->route('home');
        }
        return view('app.game.game-info',[
            'gameInfo' => $gameService,
        ]);
    }
}
