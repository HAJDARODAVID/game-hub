<?php

namespace App\Services\Games;

use App\Models\Game;

/**
 * Class GameService.
 */
class GameService
{
    private $game;

    public function __construct(
        $name = NULL,
    )
    {
        $this->game = $name != NULL ? $this->setGameBasicInfo($name) : NULL; 
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

    public function isActive(){
        if($this->game != NULL){
            return $this->game->status == Game::STATUS_ACTIVE ? TRUE : FALSE;
        }
        return FALSE;
    }

    private function setGameBasicInfo($name){
        return Game::where('name', $name)->first();
    }


}
