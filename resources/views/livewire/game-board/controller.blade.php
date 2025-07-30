<div>
    @if($gameInstance == NULL)
        <p class="text-white"> nema selektirane igre</p>
    @endif

    @if($gameInstance)
        @livewire("game-board.games.$gameBoard", [
            'gameInstance' => $gameInstance,
        ])
    @endif
</div>
