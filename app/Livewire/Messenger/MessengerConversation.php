<?php

namespace App\Livewire\Messenger;

use Livewire\Component;
use Livewire\Attributes\On;

class MessengerConversation extends Component
{

    public function mount(){
        $this->dispatch('myEvent');
    }
    public function render()
    {
        return view('livewire.messenger.messenger-conversation');
    }
}
