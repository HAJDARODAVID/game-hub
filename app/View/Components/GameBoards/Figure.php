<?php

namespace App\View\Components\GameBoards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Figure extends Component
{
    public $figuresAsset;
    public $players;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $players,
        $figuresAsset,

    ) {
        $this->players =  $players;
        $this->figuresAsset = $figuresAsset;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.game-boards.figure');
    }
}
