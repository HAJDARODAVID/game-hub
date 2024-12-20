<?php

namespace App\View\Components\GameController;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MvtBtn extends Component
{
    public $type;
    public $wireClick;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $wireClick=NULL)
    {
        $this->type = $type;
        $this->setWireClick($wireClick);
    }

    /**
     * Create a array from string 
     * Example: 
     * method-methodName.params-key01:value01,key02:value02 
     * ['method' => 'methodName', 'params' => ['key01 => 'value01', 'key02 => 'value02']]
     */
    private function setWireClick($wireClick){
        if($wireClick){
            $array = explode('.',$wireClick);
            foreach ($array as $pair) {
                list($key, $value) = explode('-',$pair);
                if($key == 'params'){
                    $paramsArray = explode(',', $value);
                    $paramsFinalArray=[];
                    foreach ($paramsArray as $paramsPair) {
                        list($newKey, $newValue) = explode(':',$paramsPair);
                        $paramsFinalArray[$newKey]=$newValue;
                    }
                    $value = $paramsFinalArray;
                }
                $this->wireClick[$key] = $value;
            }
        }
        return;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.game-controller.mvt-btn');
    }
}
