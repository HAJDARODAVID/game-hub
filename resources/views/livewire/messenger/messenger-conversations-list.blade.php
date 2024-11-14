<div>
    @if (count($conversations))
        @foreach ($conversations as $convId => $conv)
            <x-cards.item-card>
                <div class="h5">{{ $conv['title'] }}</div>
                <div class="text-secondary">{{ $conv['lastMsg'] }}</div>
            </x-cards.item-card>     
        @endforeach
    @else
        <x-cards.item-card :noItems=TRUE text='No conversations found!' />
    @endif
</div>
