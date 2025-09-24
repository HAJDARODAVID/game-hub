<?php

namespace App\Services\Games;

use App\Models\GameInstance;
use App\Models\GamePlayer;

/**
 * Class GameTurnService.
 */
class GameTurnService
{
    /**
     * Stores the game instance model.
     * @var GameInstance
     */
    private $instance = NULL;

    /**
     * Stores the game instance model.
     * @var GameInstance
     */
    private $gamePlayers = NULL;

    public function __construct($instance)
    {
        $this->instance = $this->setGameInstance($instance);
    }

    /**
     * Setting up the GameTurnService the static way.
     * For convenience sake. Nothing more.
     */
    public static function instance($instance)
    {
        return new self($instance);
    }

    public function players(): self
    {
        if ($this->instance != NULL) {
            $this->gamePlayers = GamePlayer::where('game_id', $this->instance->id)->first();
        }
        return $this;
    }

    /**
     * This will give you the game instance model.
     * Call on the constructor
     */
    private function setGameInstance($instance): GameInstance
    {
        return GameInstance::find($instance);
    }
}
