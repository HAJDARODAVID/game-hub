<?php

namespace App\Services\GameInstanceAsset;

use App\Models\GameInstance;
use App\Services\GameInstanceAsset\Fields;
use App\Services\GameInstanceAsset\Figures;

class GameAssetsService
{

    /** @var int Store here the game instance ID */
    private $instance = NULL;

    /** @var Fields */
    private $fieldsAsset;

    /** @var Figures */
    private $figuresAsset;

    public function __construct(
        Fields $fieldsAsset,
        Figures $figuresAsset,
    ) {
        $this->fieldsAsset = $fieldsAsset;
        $this->figuresAsset = $figuresAsset;
    }

    /**
     * Set the instance to get the assets for this game
     * 
     * @param int $inst Give this method the game instance
     */
    public function setInstance($inst)
    {
        $this->instance = $inst;
        return $this;
    }

    /**
     * After a move, update the field assets
     * 
     * @param array $fields Give this method the fields info
     */
    public function updateFields(array $fields)
    {
        /**Check if the instance is valid */
        if (!$this->checkIfInstanceExists()) return;

        $this->fieldsAsset->setFieldInfo($this->instance, $fields);
        return TRUE;
    }

    /**
     * Get all fields for the given game instance.
     * It will return a array of fields for each player
     * 
     * @return array
     */
    public function getFields()
    {
        return $this->fieldsAsset->getFieldInfo($this->instance);
    }

    /**
     * Set the players figures configuration.
     * This will be mainly used in the activating of the instance stage
     */
    public function setFigures(array $figures)
    {
        /**Check if the instance is valid */
        if (!$this->checkIfInstanceExists()) return;

        $this->figuresAsset->setFiguresInfo($this->instance, $figures);
        return TRUE;
    }

    /**
     * Get all figures for the given game instance.
     * It will return a array of players and there figures
     * 
     * @return array
     */
    public function getFigures()
    {
        return $this->figuresAsset->getFiguresInfo($this->instance);
    }

    /**
     * This will check if the instance in the object is valid
     * 
     * @return bool TRUE if the instance is valid, FALSE if not
     */
    private function checkIfInstanceExists(): bool
    {
        if ($this->instance == NULL) return FALSE;
        $gameInstance = GameInstance::find($this->instance);
        if ($gameInstance == NULL) return FALSE;
        return TRUE;
    }
}
