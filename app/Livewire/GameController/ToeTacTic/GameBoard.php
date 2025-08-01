<?php

namespace App\Livewire\GameController\ToeTacTic;

use App\Services\Application\AppConfig;
use Livewire\Component;
use App\Services\GameController\ToeTacTic\GameBoardStyle;

class GameBoard extends Component
{
    public $containerStyle;
    public $fields;
    public $filledFields;

    public function mount()
    {
        $gameBoardStyleService = GameBoardStyle::init();
        $this->containerStyle = $gameBoardStyleService->getContainerStyle();
        $this->fields = $gameBoardStyleService->getFieldsStyle();
    }

    public function movement($field)
    {
        $this->filledFields[$field] = TRUE;
    }

    public function render()
    {
        return view('livewire.game-controller.toe-tac-tic.game-board');
    }
}
