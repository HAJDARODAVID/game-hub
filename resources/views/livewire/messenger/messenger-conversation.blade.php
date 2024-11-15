<div style="display: flex; flex-direction: column; height: 65vh;">
    <div class="d-flex align-items-start flex-column" style="height: 200%;">
        <div class="w-100">
            <x-cards.item-card>
                IME RAZGOVORA
            </x-cards.item-card>
        </div>
        <div id="messeges" class="w-100 overflow-auto my-2 p-1" style="height: 48vh;" x-ref="scrollableDiv" x-init="$refs.scrollableDiv.scrollTop = $refs.scrollableDiv.scrollHeight">
            <x-cards.item-card>
                {{ $convId }}
            </x-cards.item-card>
            <x-cards.item-card>
                Ovo je sad testna poruka 
            </x-cards.item-card>
        </div>
        <div class="mt-auto w-100">
            <div class="form-group d-flex align-items-center">
                <textarea class="form-control" style="border-radius: 0px !important"></textarea>
                <button class="btn btn-dark shadow" style="border-radius: 0px !important;"><i class="bi bi-send"></i></button>
            </div>
        </div>
      </div>
</div>
