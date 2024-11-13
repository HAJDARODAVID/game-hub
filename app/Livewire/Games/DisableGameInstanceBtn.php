<?php

namespace App\Livewire\Games;

use App\Services\Games\GameService;
use Livewire\Component;

class DisableGameInstanceBtn extends Component
{
    public $gameInst;
    public $options = NULL;

    public function disableGameInstance(){
        $service = (new GameService())->disableGameInstance($this->gameInst);
        if($this->options){
            $method = $this->options;
            $this->$method();
        }
        $this->dispatch('refresh-open-games-list');
        return;
    }

    private function goHome(){
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.games.disable-game-instance-btn');
    }
}
