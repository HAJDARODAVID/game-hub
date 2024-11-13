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

    public function __construct($gameInst = NULL)
    {
        $this->player = Auth::user();
        $this->gameInst = $gameInst;
    }

    public function joinGameInstance(){
        if (!$this->isPlayerInGame()) {
            User::where('id', $this->player->id)->first()->update(['game_inst' => $this->gameInst]);
        }
        if (!$this->isPlayerInGameInstance()) {
            GamePlayer::create([
                'game_id' => $this->gameInst,
                'user_id' => $this->player->id,
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
