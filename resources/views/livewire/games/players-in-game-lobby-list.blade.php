<div wire:poll="getPlayersInGame">
    @if ($players)
        @foreach ($players as $player)
        <x-cards.item-card>
            <div class="d-flex justify-content-between">
                <div class="{{ $textColor[$player['status']] }}"><b>{{ $player['name'] }}</b></div>
                <div class="">
                </div>
            </div>
        </x-cards.item-card>
        @endforeach
        
    @else
        <x-cards.item-card :noItems=TRUE />
    @endif
</div>
