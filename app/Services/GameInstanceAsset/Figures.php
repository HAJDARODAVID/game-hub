<?php

namespace App\Services\GameInstanceAsset;

use App\Models\GameInstanceAsset;

class Figures extends BasicGameAssets
{
    /**
     * Defines the name to be used in the DB for this asset
     */
    const ASSET_NAME = 'figures';

    /**
     * Write the figures info
     * 
     * @param $inst Game instance ID
     * @param $figures Figures info
     */
    public function setFiguresInfo($inst, array $figures)
    {
        /**Set the game assets */
        $this->gameAssets = $this->gameAssets->where('game_inst', $inst)->where('a_name', self::ASSET_NAME)->first();
        /**Check if there is a asset for fields */
        if ($this->gameAssets == NULL) {
            /**Create a new asset */
            $this->gameAssets = GameInstanceAsset::create([
                'game_inst' => $inst,
                'a_name'    => self::ASSET_NAME,
                'a_value'   => json_encode($figures),
            ]);
        } else {
            /**Update asset */
            $this->gameAssets->update(['a_value' => json_encode($figures)]);
        }
        return TRUE;
    }

    /**
     * Get the figures info
     * 
     * @param $inst Game instance ID
     */
    public function getFiguresInfo($inst): NULL|array
    {
        $this->gameAssets = $this->gameAssets->where('game_inst', $inst)->where('a_name', self::ASSET_NAME)->first();
        if ($this->gameAssets == NULL) return NULL;
        return json_decode($this->gameAssets->a_value, TRUE);
    }
}
