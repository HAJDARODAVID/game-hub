<?php

namespace App\View\Components\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BasicCard extends Component
{
    public $title;
    public $header;
    public $classAtt;
    public $headerOptions;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $title = 'basic card',
        $header = TRUE,
        $classAtt = NULL,
        $headerOptions = NULL,
    )
    {
        $this->title = $title;
        $this->header = $header;
        $this->classAtt = $classAtt;
        $this->headerOptions = $headerOptions;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.basic-card');
    }
}
