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
        }else{
            GamePlayer::where('game_id',$this->gameInst)->where('user_id', $this->player->id)->first()->update(['status' => GamePlayer::PLAYER_STATUS_IN_GAME]);
        }
        return;
    }

    public function getMyInvites(){
        return GamePlayer::where('user_id', $this->player->id)->where('status', GamePlayer::PLAYER_STATUS_INVITED)->with('getGameInstance', 'getGameInstance.getGame','getGameInstance.getPlayer')->get();
    }

    public function invitePlayer(){
        if (!$this->isPlayerInGameInstance()) {
            GamePlayer::create([
                'game_id' => $this->gameInst,
                'user_id' => $this->player->id,
                'status' => GamePlayer::PLAYER_STATUS_INVITED,
            ]);
        }else{
            GamePlayer::where('game_id',$this->gameInst)->where('user_id', $this->player->id)->first()->update(['status' => GamePlayer::PLAYER_STATUS_INVITED]);
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

    public function leaveGame(){
        if(!is_null($this->player->game_inst)){
            User::where('id', $this->player->id)->first()->update(['game_inst' => NULL]);
        }
        $instance = GamePlayer::where('user_id', $this->player->id)->where('game_id', $this->gameInst)->first()->update(['status' => GamePlayer::PLAYER_STATUS_DENIED]);
        return $this;
    }

}
