<div>
    <button class="btn btn-success btn-sm" style="border-radius: 0px !important;"><i class="bi bi-plus-circle" wire:click='toggleModal()'></i></button>

    <x-modal.basic :show=$show :blur=TRUE :footer=FALSE>
        <x-slot:mainTitle>ARE YOU SURE?</x-slot:mainTitle>
        <x-slot:headerBtn>
            <button class="btn btn-dark btn-sm" style="border-radius: 0px !important" wire:click='toggleModal()'>X</button>
        </x-slot:headerBtn>
        <div class="d-flex justify-content-center">
            <button class="btn btn-success btn-lg" style="border-radius: 0px !important" wire:click='createNewGame()'>YES!</button>
        </div>
    </x-modal.basic>
</div>
