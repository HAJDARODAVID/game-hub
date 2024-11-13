<?php

namespace App\Livewire\Games;

use App\Services\Games\GameService;
use Livewire\Component;

class DisableGameInstanceBtn extends Component
{
    public $gameInst;

    public function disableGameInstance(){
        $service = (new GameService())->disableGameInstance($this->gameInst);
        $this->dispatch('refresh-open-games-list');
        return;
    }
    public function render()
    {
        return view('livewire.games.disable-game-instance-btn');
    }
}
