<?php

namespace App\Livewire\Games;

use App\Services\Player\PlayerService;
use Livewire\Component;

class LeaveGameBtn extends Component
{
    public $gameInst;

    public function leaveGame(){
        $service = (new PlayerService(gameInst: $this->gameInst))->leaveGame();
        $this->dispatch('refresh-my-invites-list');
    }
    public function render()
    {
        return view('livewire.games.leave-game-btn');
    }
}
