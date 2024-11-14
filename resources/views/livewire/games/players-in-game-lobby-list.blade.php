<div wire:poll="getPlayersInGame">
    @if ($players)
        @foreach ($players as $playerId => $player)
        <x-cards.item-card>
            <div class="d-flex justify-content-between">
                <div class="{{ $textColor[$player['status']] }}"><b>{{ $player['name'] }}</b></div>
                <div class="">
                    @if((Auth::user()->id == $playerId || Auth::user()->id == $gameInstObj->created_by) && ($playerId != $gameInstObj->created_by))
                        @livewire('games.leave-game-btn', [
                            'gameInst' => $gameInst,
                            'playerId' => $playerId,
                            'options' => $playerId != Auth::user()->id ? NULL : 'goHome'
                        ], key($player['name'] . '-leave-' . now() ))
                    @endif
                </div>
            </div>
        </x-cards.item-card>
        @endforeach
        
    @else
        <x-cards.item-card :noItems=TRUE />
    @endif
</div>
