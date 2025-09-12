<?php

namespace App\Livewire\Games;

use App\Models\GameParam;
use App\Services\Games\GameService;
use Livewire\Component;

class StartGameInstanceBtn extends Component
{
    public $gameInst;

    public function startGameAction()
    {
        $gameService = GameService::getGameFromInstance($this->gameInst);

        if (array_key_exists('min-players', $gameService->getGameParams())) {
            if ($gameService->getGameParams()['min-players'] == $gameService->countInGamePlayersInInstance($this->gameInst)) {
                $this->startGame($gameService);
            } else {
                return;
            }
        } else {
            $this->startGame($gameService);
        }
    }

    private function startGame(GameService $game)
    {
        $game->startGameInstance($this->gameInst);
        $this->dispatch('refresh-open-games-list');
        return redirect()->route('gameController', $this->gameInst);
    }

    public function render()
    {
        return view('livewire.games.start-game-instance-btn');
    }
}
