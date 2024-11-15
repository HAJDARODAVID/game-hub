<?php

namespace App\Livewire\Messenger;

use Livewire\Component;

class MessageContainer extends Component
{
    public $msg;
    
    public function render()
    {
        return view('livewire.messenger.message-container');
    }
}
