<?php

namespace App\Services\Messenger;

use App\Models\User;
use App\Models\Messenger\Message;
use App\Models\Messenger\Recipient;
use Illuminate\Support\Facades\Auth;
use App\Models\Messenger\Conversation;

/**
 * Class MessengerConversationService.
 */
class MessengerConversationService
{
    private $user;
    private $convId;
    private $conversation = NULL;
    private $conversationName = NULL;

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

    public function getConversationName(){
        if($this->isConversationSet()){
            return $this->conversationName;
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
        if(!is_null($this->conversation->name)){
            $this->conversationName = $this->conversation->name;
            return $this;
        }

        //Return names of recipients
        $recipients = Recipient::where('conv_id', $this->conversation->id)->whereNotIn('user_id', [$this->user->id])->get();
        $title = '';
        foreach ($recipients as $recipient) {
            $title .= $recipient->getUser->name .', ';
        }
        $title = rtrim($title, ", ");
        $this->conversationName = $title;
        return $this;
    }

}
