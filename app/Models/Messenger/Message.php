<?php

namespace App\Models\Messenger;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    const NOT_SEEN_STATUS = 0;
    const SEEN_STATUS = 1;

    use HasFactory;
    protected $table='msg_messages';
    protected $fillable = [
        'conv_id', 'message', 'seen' ,'msg_by'
    ];

    public function getUser(): HasOne{
        return $this->hasOne(User::class, 'id', 'msg_by');
    }
}
