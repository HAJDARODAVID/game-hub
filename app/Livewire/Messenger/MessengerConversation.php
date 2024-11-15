<?php

namespace App\Livewire\Messenger;

use App\Services\Messenger\MessengerConversationService;
use Livewire\Component;
use Livewire\Attributes\On;

class MessengerConversation extends Component
{
    public $convId;

    public function mount(){
        $service = new MessengerConversationService($this->convId);
        //dd($service);
    }
    
    public function render()
    {
        return view('livewire.messenger.messenger-conversation');
    }
}
