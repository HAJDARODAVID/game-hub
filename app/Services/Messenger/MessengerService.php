<?php

namespace App\Services\Messenger;

use App\Models\Messenger\Conversation;
use App\Models\Messenger\Message;
use App\Models\Messenger\Recipient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class MessengerService.
 */
class MessengerService
{
    private $user;
    private $conversations;

    public function __construct(
        $userId = NULL
    )
    {
        $this->user = $userId == NULL ? Auth::user() : User::where('id', $userId)->first();
        $this->conversations = $this->setMyConversationsInfo();
    }

    private function setMyConversationsInfo(){
        $conversationsForUser = Recipient::where('user_id', $this->user->id)->pluck('conv_id')->toArray();
        $conversations = Conversation::whereIn('id', $conversationsForUser)->orderBy('updated_at', 'desc')->pluck('id')->toArray();
        $newArray=[];
        foreach ($conversations as $key => $conv) {
            $newArray[$conv]=[
                'title' => $this->setConversationNameAndTime($conv),
                'updated' => $this->setConversationNameAndTime($conv, 'updated'),
                'lastMsg' => $this->setLastMessage($conv),
                'lastMsgTime' => $this->setLastMessage($conv, 'time'),
            ];
        }
        $conversations = $newArray;
        return $conversations;
    }

    public function getConversations(){
        return $this->conversations;
    }

    private function setConversationNameAndTime($conv_id, $what=NULL){
        $conversationInfo = Conversation::where('id', $conv_id)->first();
        if(is_null($conversationInfo)){
            return null;
        }

        if($what=='updated'){
            return $conversationInfo->updated_at->format('d-m H:i');
        }

        //Return conversation name if it is set
        if(!is_null($conversationInfo->name)){
            return $conversationInfo->name;
        }

        //Return names of recipients
        $recipients = Recipient::where('conv_id', $conv_id)->whereNotIn('user_id', [$this->user->id])->get();
        $title = '';
        foreach ($recipients as $recipient) {
            $title .= $recipient->getUser->name .', ';
        }
        $title = rtrim($title, ", ");
        return $title;
    }

    private function setLastMessage($conv_id, $what = 'msg'){
        $msg = Message::where('conv_id', $conv_id)->orderBy('id', 'desc')->first();
        if(!is_null($msg)){
            switch ($what) {
                case 'msg':
                    return $msg->message;
                    break;
                case 'time':
                    return $msg->created_at->format('d-m H:i');
                    break;
                
                default:
                    return NULL;
                    break;
            }
              
        }
        return NULL;
    }

}
