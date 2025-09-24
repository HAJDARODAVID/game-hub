<?php

namespace App\View\Components\GameController\ToeTacTic;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PlayerHeaderInfo extends Component
{
    public $currentPlayersId;
    public $playersInGame;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $currentPlayersId = [],
        $playersInGame = [],
    ) {
        $this->currentPlayersId = $currentPlayersId;
        $this->playersInGame = $playersInGame;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.game-controller.toe-tac-tic.player-header-info');
    }
}
