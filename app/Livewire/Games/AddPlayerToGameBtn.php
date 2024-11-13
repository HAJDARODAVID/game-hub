<?php

namespace App\Livewire\Games;

use Livewire\Component;

class AddPlayerToGameBtn extends Component
{
    public $show = TRUE;

    public function toggleModal(){
        return $this->show = !$this->show;
    }

    public function render()
    {
        return view('livewire.games.add-player-to-game-btn');
    }
}
