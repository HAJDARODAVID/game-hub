<div style="display: flex; flex-direction: column; height: 65vh;">
    <div class="d-flex align-items-start flex-column" style="height: 200%;">
        <div class="w-100">
            <x-cards.item-card>
                <div class="d-flex justify-content-between">
                    <div class="">{{ $conversationName }}</div>
                    <button class="btn btn-dark btn-sm shadow" style="border-radius: 0px !important" wire:click='goBack()'><i class="bi bi-arrow-return-left"></i></button>
                </div>
            </x-cards.item-card>
        </div>
        <div class="w-100" x-data="{ messages: '{{ $messages }}' }" wire:poll.5s='setMessages'> {{-- wire:poll.5s='setMessages' --}}
            <div>
                <div id="messeges" class="overflow-auto my-2 p-1" style="height: 48vh; width:100%" x-ref="scrollableDiv" x-init="$refs.scrollableDiv.scrollTop = ($refs.scrollableDiv.scrollHeight)+999">
                    @foreach ($messages as $msg)
                        @livewire('messenger.message-container', ['msg' => $msg], key($msg->id . now()))   
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-auto w-100">
            <div class="form-group d-flex align-items-center gap-2 mt-2">
                <textarea class="form-control" style="border-radius: 0px !important" wire:model.blur='newMessage'></textarea>
                <button class="btn btn-dark shadow" style="border-radius: 0px !important;" wire:click='sendNewMessage()' x-on:click="$refs.scrollableDiv.scrollTop = $refs.scrollableDiv.scrollHeight"><i class="bi bi-send"></i></button>
            </div>
        </div>
      </div>
</div>
