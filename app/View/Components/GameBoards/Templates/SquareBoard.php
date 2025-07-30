<?php

namespace App\View\Components\GameBoards\Templates;

use App\Services\GameBoard\Style\SquareBoardStyle;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SquareBoard extends Component
{
    const FIELD__COMPONENT_PATH = 'App\\Livewire\\GameBoard\\Games\\';
    public $parentStyle;
    public $centralAreaStyle;
    public $fieldGridStyle;
    public $fieldStyle;
    public $bgStyle;
    public $showFieldName = FALSE;

    public $fieldComponent;
    public $fieldComponentExists = FALSE;

    public $centralArea;
    /**
     * Create a new component instance.
     */
    public function __construct(?SquareBoardStyle $squareBoardStyle = null, $fieldComponent = NULL)
    {
        $style = is_null($squareBoardStyle) ? SquareBoardStyle::init() : $squareBoardStyle;
        $this->parentStyle = $style->getParentStyle();
        $this->centralAreaStyle = $style->getCentralAreaStyle();
        $this->fieldGridStyle = $style->getFieldGridStyle();
        $this->bgStyle = $style->getBgStyle();
        $this->fieldStyle = $style->getFieldStyles();
        $this->showFieldName = $style->getFieldNameFlag();
        $this->fieldComponent = $fieldComponent;
        $this->checkIfFieldComponentClassExists();
    }

    private function checkIfFieldComponentClassExists(){
        $nameExploded = explode('-', $this->fieldComponent);
        $className = '';
        foreach($nameExploded as $word){
            $className .= ucfirst($word);
        }
        return $this->fieldComponentExists = class_exists(self::FIELD__COMPONENT_PATH.$className);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.game-boards.templates.square-board');
    }
}
