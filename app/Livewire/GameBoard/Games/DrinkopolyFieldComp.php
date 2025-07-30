<?php

namespace App\Livewire\GameBoard\Games;

use App\Services\GameBoard\Fields\DrinkopolyFields;
use Livewire\Component;

class DrinkopolyFieldComp extends Component
{
    public $fieldName;
    public $text;
    public $icon;

    public function mount(){
        $this->text = mb_strtoupper(DrinkopolyFields::text()[$this->fieldName]);
        $this->icon = DrinkopolyFields::icon()[$this->fieldName];
    }
    public function render()
    {
        return view('livewire.game-board.games.drinkopoly-field-comp');
    }
}
