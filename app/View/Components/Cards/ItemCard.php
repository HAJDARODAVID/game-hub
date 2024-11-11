<?php

namespace App\View\Components\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemCard extends Component
{
    public $noItems;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $noItems = FALSE,
    )
    {   
        if($noItems){
           return $this->noItems = $noItems;
        }
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.item-card');
    }
}
