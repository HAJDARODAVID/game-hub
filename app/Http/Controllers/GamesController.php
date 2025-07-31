<?php

namespace App\Http\Controllers;

use App\Models\GameInstance;
use App\Services\Games\GameService;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index($game)
    {
        $gameService = new GameService($game);
        if (!$gameService->isActive()) {
            return redirect()->route('home');
        }
        return view('app.game.game-info', [
            'gameInfo' => $gameService,
        ]);
    }

    public function gameLobby(Request $request)
    {
        if (is_null($request->get('game_inst'))) {
            return redirect()->route('home');
        }
        $gameInst = GameInstance::where('id', $request->get('game_inst'))->with('getGame')->first();
        return view('app.game.game-lobby', [
            'gameInst' => $gameInst,
        ]);
    }

    public function myInvites()
    {
        return view('app.game.my-invites');
    }

    public function gameController($instance)
    {
        $gameService = new GameService();
        $gameService->setGameInstancesById($instance)->setGameInfoByInstance();
        if (!$gameService->isInstanceActive()) {
            return redirect()->route('home');
        }
        return view('app.game.game-controller', [
            'gameInfo' => $gameService,
        ]);
    }
}
