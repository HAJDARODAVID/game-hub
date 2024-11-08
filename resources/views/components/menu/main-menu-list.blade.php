<div class="dropdown-menu dropdown-menu-end @if($isPhone) show mt-2 @endif bg-dark py-0" aria-labelledby="navbarDropdown">
    <x-menu.main-menu-item />
    <x-menu.main-menu-item />
    <x-menu.main-menu-item :logout=TRUE  :last=TRUE/>
</div>