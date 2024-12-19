<?php

namespace App\View\Components\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BasicCard extends Component
{
    public $title;
    public $secTitle;
    public $header;
    public $headerIcon;
    public $classAtt;
    public $headerOptions;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $title = 'basic card',
        $secTitle = NULL,
        $header = TRUE,
        $classAtt = NULL,
        $headerOptions = NULL,
        $headerIcon = NULL,
    )
    {
        $this->title = $title;
        $this->secTitle = $secTitle;
        $this->header = $header;
        $this->classAtt = $classAtt;
        $this->headerOptions = $headerOptions;
        $this->headerIcon = $headerIcon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.basic-card');
    }
}
