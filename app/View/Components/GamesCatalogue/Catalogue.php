<?php

namespace App\View\Components\GamesCatalogue;

use App\Services\Games\CatalogueService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Catalogue extends Component
{
    public $games;
    public $gamesCount = 0;
    public $perRow = 4;
    public $rows = 0;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $service = new CatalogueService();
        $this->games = $service->getAllActiveGames()->toArray();
        $this->gamesCount = count($this->games);
        $this->rows = ceil($this->gamesCount / $this->perRow);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.games-catalogue.catalogue');
    }
}
