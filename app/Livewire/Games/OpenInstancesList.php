<?php

namespace App\Livewire\Games;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Services\Games\GameService;

class OpenInstancesList extends Component
{
    public $gameName = NULL;
    public $instances = NULL;

    #[On('refresh-open-games-list')]
    public function mount(){
        $this->instances = (new GameService($this->gameName))->openInstances()->getInstances();
    }

    public function refreshMe(){
        return;
    }

    public function render()
    {
        return view('livewire.games.open-instances-list');
    }
}
