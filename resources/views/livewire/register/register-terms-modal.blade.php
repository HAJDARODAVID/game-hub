<div class="row mb-0">
    <div class="col-md offset-md-4">
        <a class="btn btn-dark" style="border-radius: 0px !important;" wire:click='toggleModal()'>
            {{ __('Register') }}
        </a>
    </div>
    <x-modal.basic :show=$show :footer=FALSE :blur=TRUE>
        <x-slot:mainTitle>Uvjeti korištenja</x-slot:mainTitle>
        Registracijom na Game-Hub ovim putem odobravate pristup aplikaciji sljedećim stavkama Vašeg uređaja: poruke, pozivi, prednja kamera, stražnja kamera, mikrofon, zvučnik, povijest tražilica, kontakti.
        <button type="submit" class="btn btn-dark shadow" style="background-color: rgb(27, 30, 33) important; border-radius: 0px !important;">
            {{ __('Prihvaćam') }}
        </button>
    </x-modal.basic>
</div>
