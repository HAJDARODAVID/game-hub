<?php

namespace App\View\Components\Cards;

use App\Services\Games\GameService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OpenGameInfo extends Component
{
    public $instance;
    /**
     * Create a new component instance.
     */
    public function __construct($instance=NULL)
    {
        $this->instance = $instance;
    }
    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.open-game-info');
    }
}
