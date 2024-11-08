<div>
    <a class="dropdown-item bg-dark text-white py-2" 
        href="{{ route($route) }}" 
        @if($logout) 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
        @endif
    >
        {{ $name }}
    </a>
    @if (!$last)
        <hr class="p-0 m-0" style="color: white">
    @endif
</div>