<?php

namespace App\Services\GameController\ToeTacTic;

use App\Models\User;
use App\Models\GamePlayer;
use App\Models\GameInstance;
use Illuminate\Support\Facades\Auth;

class GamePlayService
{
    /** @var User */
    private $player;

    /** @var GameInstance */
    private $gameInstance;

    /** @var GamePlayer|\Illuminate\Database\Eloquent\Collection|NULL */
    private $playersInGame = NULL;

    private function __construct()
    {
        $this->player = Auth::user();
        $this->setGameInstance();
    }

    /**
     * Create new game play service instance
     */
    public static function init()
    {
        return new self();
    }

    /**
     * Set the game instance based on the players game instance
     */
    private function setGameInstance()
    {
        return $this->gameInstance = GameInstance::find($this->player->game_inst);
    }

    /**
     * Set the players in game
     */
    private function setPlayersInGame()
    {
        return $this->playersInGame = GamePlayer::where('game_id', $this->player->game_inst)->where('status', GamePlayer::PLAYER_STATUS_IN_GAME)->get();
    }

    /**
     * Get all the players
     */
    public function getPlayersInGame()
    {
        if ($this->playersInGame == NULL) $this->setPlayersInGame();
        return $this->playersInGame;
    }
}
