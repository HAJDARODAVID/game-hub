<?php

namespace App\Services\Games;

use App\Models\Game;
use App\Models\GameInstance;
use Illuminate\Support\Facades\Auth;

/**
 * Class GameService.
 */
class GameService
{
    private $game;
    private $instances;

    public function __construct(
        $name = NULL,
    )
    {
        $this->game = $name != NULL ? $this->setGameBasicInfo($name) : NULL; 
        $this->instances = $this->game != NULL ? $this->setGameInstances() : NULL;
    }

    public function getName(){
        if($this->game != NULL){
            return $this->game->name;
        }
    }

    public function getTitle(){
        if($this->game != NULL){
            return $this->game->title;
        }
    }

    public function getInstances(){
        return $this->instances->get();
    }

    public function isActive(){
        if($this->game != NULL){
            return $this->game->status == Game::STATUS_ACTIVE ? TRUE : FALSE;
        }
        return FALSE;
    }

    public function openInstances(){
        $this->instances = $this->instances->where('status', GameInstance::STATUS_OPEN);
        return $this;
    }

    public function openNewGameInstance(){
        return GameInstance::create([
            'game_id' => $this->game->id, 
            'status' => GameInstance::STATUS_OPEN, 
            'created_by' => Auth::user()->id, 
        ]);
    }

    public function disableGameInstance($id){
        return GameInstance::where('id', $id)->first()->update(['status' => GameInstance::STATUS_DISABLED]);
    }

    private function setGameBasicInfo($name){
        return Game::where('name', $name)->first();
    }

    private function setGameInstances(){
        return GameInstance::where('game_id', $this->game->id)->with('getPlayer');
    }


}
