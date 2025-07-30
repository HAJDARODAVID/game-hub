<?php

namespace App\Livewire\GameBoard;

use Livewire\Attributes\Url;
use Livewire\Component;

class Controller extends Component
{
    #[Url('game-instance')]
    public $gameInstance = NULL;

    public $gameBoard = 'drinkopoly';

    public function render()
    {
        return view('livewire.game-board.controller');
    }
}
