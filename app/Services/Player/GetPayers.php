<?php

namespace App\Services\Player;

use App\Models\GamePlayer;
use App\Models\User;

/**
 * Class GetPayersForAddingToGame.
 */
class GetPayers
{

    private $players;

    public function __construct()
    {
        $this->getAllUsers();
    }

    private function getAllUsers(){
        $this->players = User::all();
        return $this;
    }

    /**
     * Return only users that are not in a game
     */
    public function notInGame(){
        $this->players = $this->players->where('game_inst', NULL);
        return $this;
    }

    /**
     * Return only users that do not have a invite on this game already
     */
    public function hasNoInvite($gameInst){
        $gamePlayers = GamePlayer::where('game_id',$gameInst)->where('status', '!=', GamePlayer::PLAYER_STATUS_DENIED)->pluck('user_id')->toArray();
        if(!empty($gamePlayers)){
            $this->players = $this->players->whereNotIn('id', $gamePlayers);
        }
        return $this;
    }

    /**
     * Return only users that have a invite or are in the game
     */
    public function isInvited($gameInst){
        $gamePlayers = GamePlayer::where('game_id',$gameInst)->where('status', '!=', GamePlayer::PLAYER_STATUS_DENIED)->pluck('user_id')->toArray();
        if(!empty($gamePlayers)){
            $this->players = $this->players->whereIn('id', $gamePlayers);
        }
        return $this;
    }

    /**
     * Return array for inviting players to games
     */
    public function getArrayForInvites(){
        $array=[];
        foreach($this->players as $player){
            $array[$player->id]=[
                'name'=>$player->name,
                'invited' => FALSE,
            ];
        }
        return $array;
    }

    /**
     * Return array for players in the game lobby
     */
    public function getArrayForPlayersGameList($gameInst){
        $array=[];
        foreach($this->players as $player){
            $array[$player->id]=[
                'name'=>$player->name,
                'status' => GamePlayer::where('game_id',$gameInst)->where('user_id', $player->id)->first()->status,
            ];
        }
        return $array;
    }

}
