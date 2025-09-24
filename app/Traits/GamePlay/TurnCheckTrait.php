<?php

namespace App\Traits\GamePlay;

use App\Models\GamePlayer;
use Illuminate\Support\Facades\Auth;

/**
 * The TurnCheckTrait provides a method to check if a specific player's turn is active.
 */
trait TurnCheckTrait
{
    /**
     * @var array A unique identifier for the player/players whose turn it currently is.
     */
    public $currentPlayersId = null;

    /**
     * Checks if the given player's ID matches the current player's ID.
     *
     * @return bool True if it's this player's turn, otherwise false.
     */
    public function isMyTurn(): bool
    {
        $gameInstPlayers = GamePlayer::where('game_id', $this->gameInstance)->where('user_id', Auth::user()->id)->first()->turn;
        return $gameInstPlayers;
    }

    /**
     * Gets the ID's of the current players.
     * 
     * @param int $instance The ID of the game to check.
     */
    public function getCurrentPlayersId(): self
    {
        $this->currentPlayersId = GamePlayer::where('game_id', $this->gameInstance)->where('turn', TRUE)->pluck('user_id')->toArray();
        return $this;
    }

    /**
     * Disable my turn for this game instance.
     */
    public function disableMyTurn($instance): self
    {
        $gameplay = GamePlayer::where('game_id', $instance)->where('user_id', Auth::user()->id)->first()->update(['turn' => FALSE]);
        return $this;
    }
}
