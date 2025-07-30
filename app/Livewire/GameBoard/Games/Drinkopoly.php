<?php

namespace App\Livewire\GameBoard\Games;

use Livewire\Component;
use App\Services\GameBoard\Style\SquareBoardStyle;
use App\Services\GameBoard\Fields\DrinkopolyFields;

class Drinkopoly extends Component
{
    public $gameInstance;
    public $gameBoardStyle;
    public $filedInfo;
    public $fieldCompName;

    public function mount(){
        $this->gameBoardStyle = $this->serialize($this->setStyleForGameBoard());
        $this->filedInfo = $this->setFieldInfo();
        $this->fieldCompName = $this->getFieldCompName();
    }

    private function setStyleForGameBoard(){
        $style  = SquareBoardStyle::init()
            //set main layout
            ->setGridTemplateColumns(12)->setGridTemplateRows(10)->setGap(5)
            //set the main BG 
            ->setBgTypeAsRadial()->setBgColor('#5A788F')->setBgColorII('#253E54')
            ->setFieldStyles(DrinkopolyFields::style())
            ->setFieldNameFlag();
        return $style;
    }

    private function serialize($value){
        return serialize($value);
    }

    private function setFieldInfo(){
        $fieldInfoArray = [];
        $fields = DrinkopolyFields::text();
        foreach ($fields as $fieldName => $text){
            $fieldInfoArray[$fieldName]['text'] = $text;
        }
        return $fieldInfoArray;
    }

    public function getFieldCompName(){
        $class = get_class($this);
        $class = explode("\\", $class);
        $class = end($class);
        $class = strtolower($class);
        return $class .'field-comp';
    }

    public function render()
    {
        return view('livewire.game-board.games.drinkopoly');
    }
}
