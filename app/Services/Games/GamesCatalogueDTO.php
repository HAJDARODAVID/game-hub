<?php

namespace App\Services\Games;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class GamesCatalogueDTO.
 */
class GamesCatalogueDTO
{
    private $games;
    private $gamesArray=[];

    public function __construct(Collection $games)
    {
        $this->games = $games;
    }

    public function execute(){
        $count = 1;
        foreach ($this->games as $game) {
            $this->gamesArray[$count] = $game->title;
            $count++;
        }
        return $this->gamesArray;
    }

}
