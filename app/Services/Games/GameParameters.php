<?php

namespace App\Services\Games;

use App\Models\Game;
use App\Models\GameInstance;
use App\Models\GameParam;

/**
 * Class GameParameters.
 */
class GameParameters
{
    private $game;
    private $params;

    private function __construct(Game $game)
    {
        $this->game = $game;
        $this->getGameParams();
    }

    /**
     * Create a new GameParameters object instance by the game instance ID
     * 
     * @param int $inst Give the method the game instance 
     */
    public static function byInstance($inst)
    {
        $instance = GameInstance::find($inst);
        if ($instance == NULL) return;
        return new self(Game::find($instance->game_id));
    }

    /**
     * Create a new GameParameters object instance by the game ID
     * 
     * @param int $inst Give the method the game instance 
     */
    public static function byGame($game)
    {
        $game = Game::find($game);
        if ($game == NULL) return;
        return new self($game);
    }

    /**
     * This will set all the parameters for a specific game
     */
    private function getGameParams(): void
    {
        $this->params = GameParam::where('game_id', $this->game->id)->pluck('p_value', 'p_type')->toArray();
    }

    /**
     * Return the parameter value or null
     */
    public function parameter($param)
    {
        if (key_exists($param, $this->params)) return $this->params[$param];
        return NULL;
    }

    /**
     * Return all the game parameters
     */
    public function getAll()
    {
        return $this->params;
    }
}
