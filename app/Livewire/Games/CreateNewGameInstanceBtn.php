<?php

namespace App\Livewire\Games;

use App\Services\Games\GameService;
use Livewire\Component;

class CreateNewGameInstanceBtn extends Component
{
    public $show = FALSE;
    public $gameName = NULL;

    public function toggleModal(){
        return $this->show = !$this->show;
    }

    public function createNewGame(){
        $this->show = !$this->show;
        $service = (new GameService($this->gameName))->openNewGameInstance();
        $this->dispatch('refresh-open-games-list');
        return;
    }

    public function render()
    {
        return view('livewire.games.create-new-game-instance-btn');
    }
}
