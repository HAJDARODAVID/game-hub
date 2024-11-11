<?php

namespace App\Services\Games;

use App\Models\Game;

/**
 * Class CatalogueService.
 */
class CatalogueService
{
    private $games;

    public function getAllActiveGames(){
        $this->games = Game::where('status', 1)->get();
        return $this;
    }

    public function toArray(){
        $dto = new GamesCatalogueDTO($this->games);
        return $dto->execute();
    }

}
