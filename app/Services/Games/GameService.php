<?php

namespace App\Services\Games;

use App\Models\Game;
use App\Models\GameInstance;
use App\Models\GameParam;
use App\Models\GamePlayer;
use App\Models\User;
use App\Services\Player\PlayerService;
use Illuminate\Support\Facades\Auth;

/**
 * Class GameService.
 */
class GameService
{
    private $game;
    private $instances;
    private $params;

    public function __construct(
        $name = NULL,
    ) {
        $this->game = $name != NULL ? $this->setGameBasicInfo($name) : NULL;
        $this->instances = $this->game != NULL ? $this->setGameInstances() : NULL;
        $this->setGameParams();
    }

    public static function getGameFromInstance($instance)
    {
        $gameInstance = GameInstance::find($instance);
        if ($gameInstance) return new self(Game::find($gameInstance->game_id)->name);
    }

    public function getName()
    {
        if ($this->game != NULL) {
            return $this->game->name;
        }
    }

    public function getTitle()
    {
        if ($this->game != NULL) {
            return $this->game->title;
        }
    }

    public function getGameId()
    {
        if ($this->game != NULL) {
            return $this->game->id;
        }
    }

    public function getInstances()
    {
        return $this->instances->get();
    }

    public function getInstanceId()
    {
        return $this->instances->id;
    }

    public function isActive()
    {
        if ($this->game != NULL) {
            return $this->game->status == Game::STATUS_ACTIVE ? TRUE : FALSE;
        }
        return FALSE;
    }

    public function openInstances()
    {
        $this->instances = $this->instances->where('status', GameInstance::STATUS_OPEN);
        return $this;
    }

    public function openNewGameInstance()
    {
        $newGameInstance = GameInstance::create([
            'game_id' => $this->game->id,
            'status' => GameInstance::STATUS_OPEN,
            'created_by' => Auth::user()->id,
        ]);
        $playerService = new PlayerService($newGameInstance->id);
        $playerService->joinGameInstance();
        return $newGameInstance;
    }

    public function throwPlayersOutOfGame($gameInst)
    {
        $playersInGame = User::where('game_inst', $gameInst)->get();
        foreach ($playersInGame as $player) {
            $player->update([
                'game_inst' => NULL,
            ]);
        }
        $playersInGame = GamePlayer::where('game_id', $gameInst)->get();
        foreach ($playersInGame as $player) {
            $player->update([
                'status' => GamePlayer::PLAYER_STATUS_DENIED,
            ]);
        }
        return;
    }

    public function disableGameInstance($id)
    {
        $this->throwPlayersOutOfGame($id);
        return GameInstance::where('id', $id)->first()->update(['status' => GameInstance::STATUS_DISABLED]);
    }

    public function startGameInstance($id)
    {
        $this->instances = GameInstance::where('id', $id)->with('getGamePlayers')->first();
        //Remove not joined users
        foreach ($this->instances->getGamePlayers as $player) {
            if ($player->status != GamePlayer::PLAYER_STATUS_IN_GAME) {
                $player->update([
                    'status' => GamePlayer::PLAYER_STATUS_DENIED,
                ]);
            }
        }
        $this->instances->update(['status' => GameInstance::STATUS_ACTIVE]);
        return $this;
    }

    public function setGameInstancesById($id)
    {
        $this->instances = GameInstance::where('id', $id)->with('getPlayer', 'getGame')->first();
        return $this;
    }

    public function isInstanceActive()
    {
        return $this->instances->status == GameInstance::STATUS_ACTIVE ? TRUE : FALSE;
    }

    public function setGameInfoByInstance()
    {
        if ($this->instances) {
            if ($this->instances->getGame) {
                $this->game = $this->instances->getGame;
            }
        }
        return $this;
    }

    private function setGameBasicInfo($name)
    {
        return Game::where('name', $name)->first();
    }

    private function setGameInstances()
    {
        return GameInstance::where('game_id', $this->game->id)->with('getPlayer');
    }

    private function setGameParams()
    {
        $array = [];
        $paramModel = GameParam::where('game_id', $this->getGameId())->get();
        foreach ($paramModel as $param) {
            $array[$param->p_type] = $param->p_value;
        }
        $this->params = $array;
    }

    public function countPlayersInInstance($instance)
    {
        return GamePlayer::where('game_id', $instance)->whereIn('status', [10, 20])->get()->count();
    }

    public function countInGamePlayersInInstance($instance)
    {
        return GamePlayer::where('game_id', $instance)->whereIn('status', [20])->get()->count();
    }

    public function getGameParams()
    {
        return $this->params;
    }
}
