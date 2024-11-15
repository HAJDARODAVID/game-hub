<div>
    @if (count($conversations))
        @foreach ($conversations as $convId => $conv)
            <x-cards.item-card cursor='pointer' wireClick='displayThisConversation({{ $convId }})'>
                <div class="d-flex justify-content-between">
                    <div class="h5">{{ $conv['title'] }}</div>
                    <div class="text-secondary">{{ $conv['lastMsgTime'] }}</div>
                </div>
                <div class="text-secondary text-truncate">{{ $conv['lastMsg'] }}</div>
            </x-cards.item-card>     
        @endforeach
    @else
        <x-cards.item-card :noItems=TRUE text='No conversations found!' />
    @endif
</div>
