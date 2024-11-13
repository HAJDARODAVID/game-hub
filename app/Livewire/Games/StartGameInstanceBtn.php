<?php

namespace App\Livewire\Games;

use App\Services\Games\GameService;
use Livewire\Component;

class StartGameInstanceBtn extends Component
{
    public $gameInst;

    public function startGameInstance(){
        $service = (new GameService())->startGameInstance($this->gameInst);
        $this->dispatch('refresh-open-games-list');
        return;
    }
    public function render()
    {
        return view('livewire.games.start-game-instance-btn');
    }
}
