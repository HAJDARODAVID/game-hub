<?php

namespace App\Livewire\Games;

use App\Services\Player\PlayerService;
use Livewire\Component;

class MyInvitesBtn extends Component
{
    public $invitesCount;

    public function mount(){
        $this->getMyInvites();
    }

    public function getMyInvites(){
        $this->invitesCount = (new PlayerService())->getMyInvites()->count();
    }

    public function render()
    {
        return view('livewire.games.my-invites-btn');
    }
}
