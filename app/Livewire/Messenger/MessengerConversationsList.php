<?php

namespace App\Livewire\Messenger;

use App\Services\Messenger\MessengerService;
use Livewire\Component;
use Livewire\Attributes\On;

class MessengerConversationsList extends Component
{
    public $conversations;

    public function mount(){
       $this->getConversations();
    }

    #[On('refresh-conversation-list')]
    public function getConversations(){
        $this->conversations = (new MessengerService())->getConversations();
    }

    public function displayThisConversation($id){
        return $this->dispatch('set-conversation-id', $id)->to(MessengerModal::class);
    }
    
    public function render()
    {
        return view('livewire.messenger.messenger-conversations-list');
    }
}
