<?php

namespace App\Livewire\Games;

use App\Models\GamePlayer;
use App\Services\Player\GetPayers;
use Livewire\Component;

class PlayersInGameLobbyList extends Component
{
    public $gameInst;
    public $players;

    public $textColor = [
        GamePlayer::PLAYER_STATUS_IN_GAME => 'text-success',
        GamePlayer::PLAYER_STATUS_INVITED => 'text-danger',
        GamePlayer::PLAYER_STATUS_DENIED => '',
    ];

    public function mount(){
        $this->getPlayersInGame();
    }

    public function getPlayersInGame(){
        $this->players = (new GetPayers())->isInvited($this->gameInst)->getArrayForPlayersGameList($this->gameInst);
    }

    public function render()
    {
        return view('livewire.games.players-in-game-lobby-list');
    }
}
