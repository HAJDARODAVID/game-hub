<?php

namespace App\Services\GameInstanceAsset;

use App\Models\GameInstanceAsset;
use App\Contracts\GameInstanceAssetsInterface;

class BasicGameAssets implements GameInstanceAssetsInterface
{
    /**
     * @var GameInstanceAsset
     */
    protected $gameAssets;

    public function __construct(GameInstanceAsset $gameAssets)
    {
        $this->gameAssets = $gameAssets;
    }
}
