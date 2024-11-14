<div>
    <x-modal.basic :show=$show :fullScreen=TRUE :blur=TRUE>
        <x-slot:mainTitle>Messenger</x-slot:mainTitle>
        <x-slot:headerBtn>
            <button class="btn btn-dark btn-sm" style="border-radius: 0px !important" wire:click='toggleMessenger()'>X</button>
        </x-slot:headerBtn>
        @livewire('messenger.messenger-conversations-list')
    </x-modal.basic>
</div>
