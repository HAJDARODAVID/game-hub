<div class="card bg-dark" style="border-radius: 0px !important;">
    <div class="card-body text-white py-2">
        <div class=" @if ($noItems) d-flex justify-content-center @else justify-content-between  @endif align-items-center">
            @if (!$noItems)
                {{ $slot }}
            @endif
            @if ($noItems)
                <div class="py-1">
                    <i>No items available!</i>
                </div>
            @endif
        </div>
    </div>
</div>