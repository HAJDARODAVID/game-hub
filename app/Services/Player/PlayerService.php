<?php

namespace App\Services\Player;

use App\Models\User;
use App\Models\GamePlayer;
use Illuminate\Support\Facades\Auth;

/**
 * Class PlayerService.
 */
class PlayerService
{

    private $player;
    private $gameInst;

    public function __construct($gameInst = NULL, $userId = NULL)
    {
        $this->player = $userId == NULL ? Auth::user() : User::where('id', $userId)->first();
        $this->gameInst = $gameInst != NULL ? $gameInst : $this->player->game_inst;
    }

    public function joinGameInstance(){
        if (!$this->isPlayerInGame()) {
            User::where('id', $this->player->id)->first()->update(['game_inst' => $this->gameInst]);
        }
        if (!$this->isPlayerInGameInstance()) {
            GamePlayer::create([
                'game_id' => $this->gameInst,
                'user_id' => $this->player->id,
                'status' => GamePlayer::PLAYER_STATUS_IN_GAME,
            ]);
        }
        return;
    }

    public function invitePlayer(){
        if (!$this->isPlayerInGameInstance()) {
            GamePlayer::create([
                'game_id' => $this->gameInst,
                'user_id' => $this->player->id,
                'status' => GamePlayer::PLAYER_STATUS_INVITED,
            ]);
        }
        return;
    }

    public function isPlayerInGame(){
        if(is_null($this->player->game_inst)){
            return FALSE;
        }
        return TRUE;
    }

    public function isPlayerInGameInstance(){
        $instance = GamePlayer::where('user_id', $this->player->id)->where('game_id', $this->gameInst)->count();
        return $instance == 0 ? FALSE : TRUE;
    }

}
