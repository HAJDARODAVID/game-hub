<?php

namespace App\Livewire\Games;

use Livewire\Component;
use App\Services\Games\GameService;

class OpenInstancesList extends Component
{
    public $gameName = NULL;
    public $instances = NULL;

    public function mount(){
        $this->instances = (new GameService($this->gameName))->openInstances()->getInstances();
    }

    public function render()
    {
        return view('livewire.games.open-instances-list');
    }
}