<?php

namespace App\Livewire\Messenger;

use Livewire\Component;
use Livewire\Attributes\On;

class MessengerModal extends Component
{
    public $show = FALSE;
    public $conversationId = NULL;

    #[On('toggle-messenger-modal')]
    public function toggleMessenger(){
        if(!$this->show){
            $this->dispatch('refresh-conversation-list');
        }
        $this->show = !$this->show;
    }

    #[On('set-conversation-id')]
    public function setConversationId($id){
        $this->conversationId = $id;
    }
    public function render()
    {
        return view('livewire.messenger.messenger-modal');
    }
}
