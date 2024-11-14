<?php

namespace App\Livewire\Messenger;

use Livewire\Component;

class MessengerBtn extends Component
{
    public function showMessenger(){
        $this->dispatch('toggle-messenger-modal');
    }
    
    public function render()
    {
        return view('livewire.messenger.messenger-btn');
    }
}
