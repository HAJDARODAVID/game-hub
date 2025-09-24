<?php

namespace App\Services\Games;

use App\Models\GameInstance;
use App\Models\GamePlayer;
use App\Models\User;

/**
 * Class GamesPlayService.
 */
class GamesPlayService
{
    /**
     * @var GameInstance|NULL Game instance ID.
     */
    private $instance;

    /**
     * @var GamePlayer|NULL Game players from instance.
     */
    private $gamePlayers;

    /**
     * Set the game instance and get all the data for this game instance
     * 
     * @param int $instance The game play ID. Defines the instance of a game
     * @return self|string
     */
    public function instance($instance): self|string
    {
        /**Check if this instance exists */
        $this->instance = GameInstance::find($instance);
        if ($this->instance == NULL) return 'Game instance not found!';
        /**Set the game players model */
        $this->gamePlayers = GamePlayer::where('game_id', $this->instance->id)->get();
        return $this;
    }

    /**
     * This will return a array with all the players in the game.
     * Used for displaying players
     * 
     * @return array Key pair array where the key is the user ID, and the value the player name
     */
    public function getPlayersInGame(): array
    {
        $usersInGame = $this->gamePlayers->pluck('user_id')->toArray();
        $usersGamePieces = $this->gamePlayers->pluck('game_piece', 'user_id')->toArray();
        $usersInGameArray = [];
        foreach ($usersInGame as $user) {
            $usersInGameArray[$user] = [
                'name' => User::find($user)->name,
                'game_piece' => $usersGamePieces[$user],
            ];
        }
        return $usersInGameArray;
    }
}
