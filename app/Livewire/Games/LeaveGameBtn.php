<?php

namespace App\Livewire\Games;

use App\Services\Player\PlayerService;
use Livewire\Component;

class LeaveGameBtn extends Component
{
    public $gameInst;
    public $playerId;
    public $options = NULL;

    public function leaveGame(){
        $service = (new PlayerService(gameInst: $this->gameInst, userId: $this->playerId))->leaveGame();
        if($this->options){
            $method = $this->options;
            $this->$method();
        }
        $this->dispatch('refresh-my-invites-list');
    }

    private function goHome(){
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.games.leave-game-btn');
    }
}
