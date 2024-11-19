<?php

namespace App\Livewire\Messenger;

use Livewire\Component;
use Livewire\Attributes\On;

class MessengerModal extends Component
{
    public $show = FALSE;
    public $conversationId = NULL;
    public $searchEnabled = FALSE;

    #[On('toggle-messenger-modal')]
    public function toggleMessenger(){
        if(!$this->show){
            $this->dispatch('refresh-conversation-list');
        }
        if($this->show){
            $this->conversationId = NULL;
        }
        $this->show = !$this->show;
    }

    public function eanbleSearch(){
        $this->searchEnabled = !$this->searchEnabled;
    }

    #[On('set-conversation-id')]
    public function setConversationId($id){
        $this->searchEnabled = FALSE;
        $this->conversationId = $id;
    }
    
    #[On('go-back-to-all-conversations')]
    public function resetConversationId(){
        $this->dispatch('refresh-conversation-list');
        $this->searchEnabled = FALSE;
        $this->conversationId = NULL;
    }

    public function render()
    {
        return view('livewire.messenger.messenger-modal');
    }
}
