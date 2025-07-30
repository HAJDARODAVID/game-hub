<div>
    <button class="btn btn-success btn-sm" style="border-radius: 0px !important;" wire:click='toggleModal()'><i class="bi bi-person-add"></i></button>

    <x-modal.basic :show=$show :footer=FALSE :blur=TRUE>
        <x-slot:mainTitle>Add players to game</x-slot:mainTitle>
        <x-slot:headerBtn>
            <button class="btn btn-dark btn-sm" style="border-radius: 0px !important;" wire:click='toggleModal()'>X</button>
        </x-slot:headerBtn>
        @if ($players)
        @foreach ($players as $user_id => $player)
            <x-cards.item-card>
                <div class="d-flex justify-content-between">
                    <div class=""><b>{{ $player['name'] }}</b></div>
                    <div class="">
                        @if(!$player['invited'] && $canInviteMorePlayers)
                            <button class="btn btn-success btn-sm" style="border-radius: 0px !important;" wire:click='invite({{ $user_id }})' wire:target="invite" wire:loading.attr="disabled">INVITE[{{ $playerCount }}]</button>
                        @endif
                    </div>
                </div>
            </x-cards.item-card>
            
        @endforeach            
        @else
            <x-cards.item-card :noItems=TRUE />
        @endif
    </x-modal.basic>
</div>
