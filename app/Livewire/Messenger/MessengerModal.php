<?php

namespace App\Livewire\Messenger;

use Livewire\Component;
use Livewire\Attributes\On;

class MessengerModal extends Component
{
    public $show = FALSE;

    #[On('toggle-messenger-modal')]
    public function toggleMessenger(){
        if(!$this->show){
            $this->dispatch('refresh-conversation-list');
        }
        $this->show = !$this->show;
    }
    public function render()
    {
        return view('livewire.messenger.messenger-modal');
    }
}
