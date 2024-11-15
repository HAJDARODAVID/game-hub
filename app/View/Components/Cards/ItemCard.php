<?php

namespace App\View\Components\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemCard extends Component
{
    public $noItems;
    public $text;
    public $cursor;
    public $wireClick;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $noItems = FALSE,
        $text = 'No items available!',
        $cursor = '',
        $wireClick = NULL,
    )
    {   
        $this->cursor = $cursor;
        $this->wireClick = $wireClick;
        if($noItems){
            $this->text = $text;
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
