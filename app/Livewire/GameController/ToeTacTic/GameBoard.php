<?php

namespace App\Livewire\GameController\ToeTacTic;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Services\Application\AppConfig;
use App\Services\Games\GameTurnService;
use App\Traits\GamePlay\TurnCheckTrait;
use App\Services\Games\GamesPlayService;
use App\Traits\GamePlay\GameControlsTrait;
use App\Services\GameInstanceAsset\GameAssetsService;
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

    protected $gameAssets;

    public function mount(
        GameBoardStyle $gameBoardStyleService,
        GamesPlayService $gamePlayService,
        GameAssetsService $gameAssets,
    ) {
        /**Set the instance on the GamePlayerService and GameAssetsService*/
        $gamePlayService = $gamePlayService->instance($this->gameInstance);
        $gameAssets = $gameAssets->setInstance($this->gameInstance);
        /**Populate the properties */
        $this->playersInGame = $gamePlayService->getPlayersInGame();
        $this->containerStyle = $gameBoardStyleService->getContainerStyle();
        $this->fields = $gameBoardStyleService->getFieldsStyle();
        /**Set the game data */
        $this->getGamePlayInfo($gameAssets);
    }

    public function getGamePlayInfo(GameAssetsService $gameAssets)
    {
        /**Set the instance on the GamePlayerService and GameAssetsService*/
        $gameAssets = $gameAssets->setInstance($this->gameInstance);
        /**Add object to properties */
        $this->gameAssets = $gameAssets;

        /**Check if its my turn to enable or disable my controls*/
        $this->isMyTurn($this->gameInstance) ? $this->enableControls() : $this->disableControls();

        /**Get player/players whose turn it currently is */
        $this->getCurrentPlayersId();

        /**Get fields */
        $this->filledFields = $gameAssets->getFields();
    }

    public function movement($field, GameAssetsService $gameAssets)
    {
        /**Set the instance for the assets */
        $gameAssets = $gameAssets->setInstance($this->gameInstance);
        /**Update field */
        $gameAssets->updateFields([$field]);

        /**Turn controls */
        $this->disableControls()->disableMyTurn($this->gameInstance)->getGamePlayInfo($gameAssets);
    }

    public function render()
    {
        return view('livewire.game-controller.toe-tac-tic.game-board', [
            'figuresAsset' => $this->gameAssets->getFigures(),
        ]);
    }
}
