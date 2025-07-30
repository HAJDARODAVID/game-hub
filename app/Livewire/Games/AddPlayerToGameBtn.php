<?php

namespace App\Livewire\Games;

use App\Services\Games\GameService;
use App\Services\Player\GetPayers;
use App\Services\Player\PlayerService;
use Livewire\Component;

class AddPlayerToGameBtn extends Component
{
    public $show = FALSE;
    public $gameInst;
    public $players;
    public $playerCount;

    public $gameParams;

    public $canInviteMorePlayers = TRUE;

    public function toggleModal()
    {
        $this->show = !$this->show;
        $this->players = $this->show == TRUE ? (new GetPayers())->notInGame()->hasNoInvite($this->gameInst)->getArrayForInvites() : NULL;
        $gameService = GameService::getGameFromInstance($this->gameInst);
        $this->gameParams = $gameService->getGameParams();
        $this->playerCount = $gameService->countPlayersInInstance($this->gameInst);
        $this->checkIfAbleToInviteMorePlayers();
        return;
    }

    public function invite($user_id)
    {
        $this->players[$user_id]['invited'] = TRUE;
        $playerService = (new PlayerService($this->gameInst, $user_id))->invitePlayer();
        $gameService = GameService::getGameFromInstance($this->gameInst);
        $this->playerCount = $gameService->countPlayersInInstance($this->gameInst);
        $this->checkIfAbleToInviteMorePlayers();
        return;
    }

    private function checkIfAbleToInviteMorePlayers()
    {
        $gameService = GameService::getGameFromInstance($this->gameInst);
        if ($gameService->countPlayersInInstance($this->gameInst) < $this->gameParams['allowed-players']) {
            return $this->canInviteMorePlayers = TRUE;
        }
        return $this->canInviteMorePlayers = FALSE;
    }

    public function render()
    {
        return view('livewire.games.add-player-to-game-btn');
    }
}
