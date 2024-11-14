<?php

namespace App\Livewire\Games;

use Livewire\Component;
use App\Services\Player\PlayerService;

class JoinGameBtn extends Component
{
    public $gameInst;

    public function joinGame(){
        $service = (new PlayerService(gameInst: $this->gameInst))->joinGameInstance();
        return redirect()->route('gameLobby',['game_inst' => $this->gameInst]);
    }

    public function render()
    {
        return view('livewire.games.join-game-btn');
    }
}
