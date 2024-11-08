<div>
    <a class="dropdown-item" href="{{ route($route) }}" @if($logout) onclick="event.preventDefault(); document.getElementById('logout-form').submit();" @endif>
        {{ $name }}
    </a>
</div>