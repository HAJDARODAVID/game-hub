<?php

namespace App\View\Components\Menu;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class MainMenuList extends Component
{
    public $isPhone;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->isPhone = Session::get('is_phone');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu.main-menu-list');
    }
}
