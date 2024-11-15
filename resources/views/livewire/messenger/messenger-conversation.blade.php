<div style="display: flex; flex-direction: column; height: 65vh;">
    <div class="d-flex align-items-start flex-column" style="height: 200%;">
        <div class="w-100">
            <x-cards.item-card>
                IME RAZGOVORA
            </x-cards.item-card>
        </div>
        <div class="" wire:poll='setMessages'>
            <div x-data="{ messages: '{{ $messages }}' }">
                <div id="messeges" class="w-100 overflow-auto my-2 p-1" style="height: 48vh;" x-ref="scrollableDiv" x-init="$refs.scrollableDiv.scrollTop = $refs.scrollableDiv.scrollHeight+999">
                    @foreach ($messages as $msg)
                        @livewire('messenger.message-container', ['msg' => $msg], key($msg->id . now()))   
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-auto w-100">
            <div class="form-group d-flex align-items-center">
                <textarea class="form-control" style="border-radius: 0px !important" wire:model.blur='newMessage'></textarea>
                <button class="btn btn-dark shadow" style="border-radius: 0px !important;" wire:click='sendNewMessage()'><i class="bi bi-send"></i></button>
            </div>
        </div>
      </div>
</div>
