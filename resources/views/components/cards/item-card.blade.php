<div class="card bg-dark" style="border-radius: 0px !important;">
    <div class="card-body text-white py-2">
        <div class="d-flex justify-content-@if ($noItems)center @else between @endif align-items-center">
            @if (!$noItems)
                <div class="">
                    <b>Game by: david69</b> <br>
                    <span class="text-danger">Players in game: 12</span>
                </div>
                <div class=""><button class="btn btn-success btn-sm" style="border-radius: 0px !important;">Join</button></div>
            @endif
            @if ($noItems)
                <div class="">
                    <i>No items available!</i>
                </div>
            @endif
        </div>
    </div>
</div>