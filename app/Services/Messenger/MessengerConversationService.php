<?php

namespace App\Services\Messenger;

use App\Models\Messenger\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class MessengerConversationService.
 */
class MessengerConversationService
{
    private $user;
    private $conversation;
    private $messages;

    public function __construct(
        $convId,
        $user = NULL,
    )
    {
        $this->user = $user == NULL ? Auth::user() : User::where('id', $user)->first(); 
        $this->setConversationData($convId);
    }
    
    private function setConversationData($convId){
        $this->conversation = Conversation::where('id', $convId)->first();
    }
}
