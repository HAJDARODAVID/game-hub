<?php

namespace App\View\Components\GamesCatalogue;

use App\Services\Games\CatalogueService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Catalogue extends Component
{
    // public $games=[
    //     1 => 'Super Mario Bros. †',
    //     2 => 'Duck Hunt †',
    //     3 => 'Super Mario Bros. 3 †',
    //     4 => 'Tetris',
    //     5 => 'Super Mario Bros. 2',
    //     6 => 'The Legend of Zelda',
    //     7 => 'Dr. Mario',
    //     8 => 'Zelda II: The Adventure of Link',
    //     9 => 'Excitebike',
    //     10 => 'Golf',
    //     11 => 'Teenage Mutant Ninja Turtles †',
    //     12 => 'Dragon Quest III',
    //     13 => 'Kung Fu',
    //     14 => 'Baseball',
    //     15 => 'Dragon Quest IV',
    //     16 => 'World Class Track Meet †',
    //     17 => 'Punch-Out!!',
    //     18 => 'Metroid',
    //     19 => 'Super Mario Bros. 2',
    //     20 => 'Dragon Quest II',
    // ];
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
