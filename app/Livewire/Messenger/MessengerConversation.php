<?php

namespace App\Livewire\Messenger;

use App\Services\Messenger\MessengerConversationService;
use Livewire\Component;
use Livewire\Attributes\On;

class MessengerConversation extends Component
{
    public $convId;
    public $newMessage = NULL;
    public $messageCount = 10;

    public $conversationData = NULL;
    public $messages = NULL;

    public function mount(){
        $this->setConversationData()->setMessages();
    }

    public function setConversationData(){
        $this->conversationData = (new MessengerConversationService($this->convId))->getConversationData();
        return $this;
    }

    public function setMessages(){
        $this->messages = (new MessengerConversationService($this->convId))->getMessages($this->messageCount);
        return $this;
    }

    public function sendNewMessage(){
        if($this->newMessage){
            $service = (new MessengerConversationService($this->convId));
            $service->sendNewMessage($this->newMessage);
        }
        $this->setMessages();
        $this->newMessage = NULL;
    }
    
    public function render()
    {
        return view('livewire.messenger.messenger-conversation');
    }
}
