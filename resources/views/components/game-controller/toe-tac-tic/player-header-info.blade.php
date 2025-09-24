<div class="row">
    {{-- <div class="col">
        <div class="d-flex justify-content-center"><p class="h3">X</p></div>
        <div class="d-flex justify-content-center">{{ Auth::user()->name }}</div>
    </div>
    <div class="col">
        <div class="d-flex justify-content-center"><p class="h3">O</p></div>
        <div class="d-flex justify-content-center">{{ Auth::user()->name }}</div>
    </div> --}}
    @foreach ($playersInGame as $playerID => $player)
        <div class="col @if (in_array($playerID, $currentPlayersId)) text-success @endif">
            <div class="d-flex justify-content-center"><p class="h3"><i class="{{ $player['game_piece'] }}"></i></p></div>
            <div class="d-flex justify-content-center">{{ $player['name'] }}</div>
        </div>
    @endforeach
</div>