<?php

namespace App\Livewire\Games;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Services\Player\PlayerService;

class MyInvitesList extends Component
{
    public $invites;

    public function mount(){
        $this->getMyInvites();
    }

    #[On('refresh-my-invites-list')]
    public function getMyInvites(){
        $this->invites = (new PlayerService())->getMyInvites();
    }
    
    public function render()
    {
        return view('livewire.games.my-invites-list');
    }
}
