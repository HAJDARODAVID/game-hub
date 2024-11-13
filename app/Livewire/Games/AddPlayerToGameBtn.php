<?php

namespace App\Livewire\Games;

use App\Services\Player\GetPayers;
use App\Services\Player\PlayerService;
use Livewire\Component;

class AddPlayerToGameBtn extends Component
{
    public $show = FALSE;
    public $gameInst;
    public $players;

    public function toggleModal(){
        $this->show = !$this->show;
        $this->players = $this->show == TRUE ? (new GetPayers())->notInGame()->hasNoInvite($this->gameInst)->getArrayForInvites() : NULL;
        return;
    }

    public function invite($user_id){
        $this->players[$user_id]['invited'] = TRUE;
        $playerService = (new PlayerService($this->gameInst, $user_id))->invitePlayer();
        return;
    }

    public function render()
    {
        return view('livewire.games.add-player-to-game-btn');
    }
}
