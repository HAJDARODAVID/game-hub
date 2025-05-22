<?php

namespace App\View\Components\GameBoards\Templates;

use App\Services\GameBoard\Style\SquareBoardStyle;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SquareBoard extends Component
{
    public $parentStyle;
    public $centralAreaStyle;
    public $fieldGridStyle;
    public $fieldStyle;
    public $bgStyle;
    /**
     * Create a new component instance.
     */
    public function __construct(?SquareBoardStyle $squareBoardStyle = null)
    {
        $style = is_null($squareBoardStyle) ? SquareBoardStyle::init() : $squareBoardStyle;
        $this->parentStyle = $style->getParentStyle();
        $this->centralAreaStyle = $style->getCentralAreaStyle();
        $this->fieldGridStyle = $style->getFieldGridStyle();
        $this->bgStyle = $style->getBgStyle();
        $this->fieldStyle = $style->getFieldStyles();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.game-boards.templates.square-board');
    }
}
