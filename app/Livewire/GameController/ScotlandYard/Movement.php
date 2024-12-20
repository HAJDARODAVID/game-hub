<?php

namespace App\Livewire\GameController\ScotlandYard;

use Livewire\Component;

class Movement extends Component
{
    public function render()
    {
        return view('livewire.game-controller.scotland-yard.movement');
    }

    public function test($params=NULL){
        dd('ah jaaaaa',$params);
    }
}
