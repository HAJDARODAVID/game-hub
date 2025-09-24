<?php

namespace App\Livewire\GameController\ToeTacTic;

use Livewire\Component;
use App\Services\Application\AppConfig;
use App\Services\Games\GameTurnService;
use App\Traits\GamePlay\TurnCheckTrait;
use App\Services\Games\GamesPlayService;
use App\Traits\GamePlay\GameControlsTrait;
use App\Services\GameController\ToeTacTic\GameBoardStyle;

class GameBoard extends Component
{
    use GameControlsTrait, TurnCheckTrait;

    public $gameInstance;
    public $containerStyle;
    public $fields;
    public $filledFields;

    /**
     * @var array Put all the players here.
     */
    public $playersInGame;

    public function mount(
        GameBoardStyle $gameBoardStyleService,
        GamesPlayService $gamePlayService,
    ) {
        /**Set the instance on the GamePlayerService */
        $gamePlayService = $gamePlayService->instance($this->gameInstance);
        /**Populate the properties */
        $this->playersInGame = $gamePlayService->getPlayersInGame();
        $this->containerStyle = $gameBoardStyleService->getContainerStyle();
        $this->fields = $gameBoardStyleService->getFieldsStyle();
        /**Set the game data */
        $this->getGamePlayInfo();
    }

    public function getGamePlayInfo()
    {
        /**Check if its my turn to enable or disable my controls*/
        $this->isMyTurn($this->gameInstance) ? $this->enableControls() : $this->disableControls();

        /**Get player/players whose turn it currently is */
        $this->getCurrentPlayersId();
    }

    public function movement($field)
    {
        //GamePlayService::init();
        $this->filledFields[$field] = TRUE;
        $this->disableControls()->disableMyTurn($this->gameInstance);
    }

    public function render()
    {
        return view('livewire.game-controller.toe-tac-tic.game-board');
    }
}
