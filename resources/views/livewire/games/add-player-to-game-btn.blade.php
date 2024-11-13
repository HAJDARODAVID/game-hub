<div>
    <button class="btn btn-success btn-sm" style="border-radius: 0px !important;" wire:click='toggleModal()'><i class="bi bi-person-add"></i></button>

    <x-modal.basic :show=$show :footer=FALSE :blur=TRUE>
        <x-slot:mainTitle>Add players to game</x-slot:mainTitle>
        <x-slot:headerBtn>
            <button class="btn btn-dark btn-sm" style="border-radius: 0px !important;" wire:click='toggleModal()'>X</button>
        </x-slot:headerBtn>
        <x-cards.item-card>
            <div class="d-flex justify-content-between">
                <div class=""><b>Naziv igrača</b></div>
                <div class="">
                    <button class="btn btn-success btn-sm" style="border-radius: 0px !important;">INVITE</button>
                </div>
            </div>
        </x-cards.item-card>
        <x-cards.item-card>
            <div class="d-flex justify-content-between">
                <div class="">Naziv igrača</div>
                <div class="">
                    <button class="btn btn-success btn-sm" style="border-radius: 0px !important;">INVITE</button>
                </div>
            </div>
        </x-cards.item-card>
    </x-modal.basic>
</div>
