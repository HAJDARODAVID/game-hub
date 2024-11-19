<div>
    <x-modal.basic :show=$show :fullScreen=TRUE :blur=TRUE>
        <x-slot:mainTitle>Messenger</x-slot:mainTitle>
        <x-slot:headerBtn>
            @if (!$conversationId)
                <button class="btn btn-dark btn-sm" style="border-radius: 0px !important" wire:click='eanbleSearch()'><i class="bi bi-search"></i></button>    
            @endif
            <button class="btn btn-dark btn-sm" style="border-radius: 0px !important" wire:click='toggleMessenger()'>X</button>
        </x-slot:headerBtn>
        @if ($searchEnabled)
            <x-slot:secTitle>
                <input type="text" class="form-control form-control-sm">
            </x-slot:mainTitle>
        @endif
        @if ($conversationId)
            @livewire('messenger.messenger-conversation',[
                'convId' => $conversationId,
            ])
        @endif
        @if (!$conversationId)
            @livewire('messenger.messenger-conversations-list')
        @endif
    </x-modal.basic>
</div>
