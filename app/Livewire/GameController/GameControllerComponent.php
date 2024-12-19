<?php

namespace App\Livewire\GameController;

use Livewire\Component;
use App\Models\GameController\GameOption;

class GameControllerComponent extends Component
{
    public $gameID;
    public $gameName;
    public $instanceID;
    public $gameOptions;

    public function mount(){
        $this->gameOptions = $this->setGameOptions();
    }

    public function setGameOptions(){
        $array=[];
        $namespace = $this->giveMeClassNameFrom($this->gameName);
        $optionCollection = GameOption::where('game_id', $this->gameID)->where('active', TRUE)->get();
        foreach ($optionCollection as $option) {
            if (class_exists('App\Livewire\GameController\\'.$namespace.'\\'.$this->giveMeClassNameFrom($option->option))) {
                $array[]=$option->option;
            }
        }
        return $array;
    }

    private function giveMeClassNameFrom($string){
        $class='';
        $nameArray = explode('-',$string);
        foreach ($nameArray as $name) {
            $class = $class . ucfirst($name);
        }
        return $class;
    }
    public function render()
    {
        return view('livewire.game-controller.game-controller-component');
    }
}
