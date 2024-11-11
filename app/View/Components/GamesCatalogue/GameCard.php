<?php

namespace App\View\Components\GamesCatalogue;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GameCard extends Component
{
    public $gameInfo;
    /**
     * Create a new component instance.
     */
    public function __construct($gameInfo)
    {
        $this->gameInfo = $gameInfo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.games-catalogue.game-card');
    }
}
