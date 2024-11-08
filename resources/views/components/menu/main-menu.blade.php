<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
            @if(!Session::get('is_phone'))
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
            @endif
            <x-menu.main-menu-list />
        </li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>