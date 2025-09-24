<div class="row">
    @foreach ($playersInGame as $playerID => $player)
        <div class="col @if (in_array($playerID, $currentPlayersId)) text-success @endif">
            <div class="d-flex justify-content-center"><p class="h3"><i class="{{ $player['game_piece'] }}"></i></p></div>
            <div class="d-flex justify-content-center">{{ $player['name'] }}</div>
        </div>
    @endforeach
</div>