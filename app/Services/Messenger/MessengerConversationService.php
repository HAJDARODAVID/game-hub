<?php

namespace App\Services\Messenger;

use App\Models\Messenger\Conversation;
use App\Models\Messenger\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class MessengerConversationService.
 */
class MessengerConversationService
{
    private $user;
    private $convId;
    private $conversation = NULL;

    public function __construct(
        $convId,
        $user = NULL,
    )
    {
        $this->user = $user == NULL ? Auth::user() : User::where('id', $user)->first(); 
        $this->convId = $convId;
    }


    public function sendNewMessage($message){
        if($this->isConversationSet()){
            $message = Message::create([
                'conv_id' => $this->conversation->id, 
                'msg_by' => $this->user->id,
                'message' => $message, 
                'seen' => Message::NOT_SEEN_STATUS,
            ]);
            $this->conversation->touch();
        }
        return;
    }

    public function getMessages($count){
        if($this->isConversationSet()){
            $lastMsg = Message::where('conv_id', $this->conversation->id)->orderBy('id','desc')->take($count)->pluck('id')->toArray();
            $messages = Message::whereIn('id', $lastMsg)->orderBy('id','asc')->with('getUser')->get();
            return $messages;
        }
    }

    public function getConversationData(){
        if($this->isConversationSet()){
            return $this->conversation;
        }
    }

    private function isConversationSet(){
        if($this->conversation){
            return TRUE;
        }
        $this->setConversationData();
        return TRUE;
    }
    
    private function setConversationData(){
        $this->conversation = Conversation::where('id', $this->convId)->first();
        return $this;
    }

}
