<?php

namespace App\Livewire\Messenger;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Messenger\Seen;
use App\Models\Messenger\Message;
use Illuminate\Support\Facades\Auth;

class MessageContainer extends Component
{
    public $msg;
    public $msgSeen;

    public function mount(){
        $this->msgSeen = $this->setMsgSeen();
    }

    public function setMsgSeen(){
        if($this->msg->msg_by != Auth::user()->id){
            return Seen::where('msg_id', $this->msg->id)->where('user_id', Auth::user()->id)->first();
        }
        return NULL;
    }

    #[On('seen-message')]
    public function seenMessage($msgId){
        $message = Message::where('id',$msgId)->first();
        $msgSeen = Seen::where('msg_id', $msgId)->where('user_id', Auth::user()->id)->first();
        if($message->msg_by != Auth::user()->id && is_null($msgSeen)){
            Seen::create([
                'user_id' => Auth::user()->id,
                'msg_id' => $message->id,
            ]);
        }
        $this->msgSeen = $this->setMsgSeen();
    }
    
    public function render()
    {
        return view('livewire.messenger.message-container');
    }
}
