<div wire:poll='getMyInvites'>
    @if ($invites->count() > 0)
        @foreach ($invites as $invite)
            <x-cards.item-card>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <span class="h5">{{$invite->getGameInstance->first()->getGame->title }}</span><br>
                        <span class="text-danger">
                            {{$invite->getGameInstance->first()->getPlayer->name }} | {{ date('d-m H:i',strtotime($invite->created_at)) }}
                        </span>
                    </div>
                    <div class="d-flex gap-1">
                        @livewire('games.leave-game-btn', [
                            'gameInst' => $invite->getGameInstance->first()->id,
                        ], key($invite->getGameInstance->first()->id . '-leave-' . now()))
                        <x-v-divider />
                        @livewire('games.join-game-btn', [
                            'gameInst' => $invite->getGameInstance->first()->id,
                        ], key($invite->getGameInstance->first()->id . '-join-' . now()))
                    </div>
                </div>
            </x-cards.item-card>
        @endforeach
    @else
        <x-cards.item-card :noItems=TRUE />
    @endif
    
</div>
