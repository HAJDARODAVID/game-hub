<?php

namespace App\View\Components\Menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainMenuItem extends Component
{
    public $logout;
    public $route;
    public $name;
    public $last;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $logout = FALSE,
        $route = 'home',
        $name = 'Home',
        $last = FALSE,
        )
    {
        $this->last=$last;
        $this->logout = $logout;
        if($this->logout){
            $this->route = 'logout';
            $this->name = 'Logout';
            return;
        }
        $this->route = $route;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu.main-menu-item');
    }
}
