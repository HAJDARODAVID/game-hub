<?php

namespace App\Services\GameInstanceAsset;

use App\Models\GameInstanceAsset;
use Illuminate\Support\Facades\Auth;
use App\Services\Games\GameParameters;

class Fields extends BasicGameAssets
{
    /**
     * Defines the name to be used in the DB for this asset
     */
    const ASSET_NAME = 'fields';

    /**
     * Write the field info
     * 
     * @param $inst Game instance ID
     * @param $field Field name
     */
    public function setFieldInfo($inst, array $field)
    {
        /**Get the game parameters */
        $gameParams = GameParameters::byInstance($inst);
        /**Set the game assets */
        $this->gameAssets = $this->gameAssets->where('game_inst', $inst)->where('a_name', self::ASSET_NAME)->where('a_value_2', Auth::user()->id)->first();
        /**Check if there is a asset for fields */
        if ($this->gameAssets == NULL) {
            /**Create a new asset */
            $this->gameAssets = GameInstanceAsset::create([
                'game_inst' => $inst,
                'a_name'    => self::ASSET_NAME,
                'a_value'   => json_encode($field),
                'a_value_2' => Auth::user()->id,
            ]);
        } else {
            $assetsFieldsInfo = [];
            /**Check if there is a parameter for the update */
            if ($gameParams->parameter('keep-fields')) {
                $assetsFieldsInfo = json_decode($this->gameAssets->a_value);
            }
            $assetsFieldsInfo[] = $field[0];
            /**Update asset */
            $this->gameAssets->update(['a_value' => json_encode($assetsFieldsInfo)]);
        }
        return TRUE;
    }

    /**
     * Get the field info
     * 
     * @param $inst Game instance ID
     */
    public function getFieldInfo($inst): NULL|array
    {
        $this->gameAssets = $this->gameAssets->where('game_inst', $inst)->where('a_name', self::ASSET_NAME)->get();
        if ($this->gameAssets == NULL) return NULL;
        $fields = [];
        foreach ($this->gameAssets as $player) {
            $playerFields = json_decode($player->a_value);
            foreach ($playerFields as $field) {
                $fields[$field] = $player->a_value_2;
            }
        }
        return $fields;
    }
}
