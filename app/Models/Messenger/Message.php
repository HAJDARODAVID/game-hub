<?php

namespace App\Models\Messenger;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    const NOT_SEEN_STATUS = 0;
    const SEEN_STATUS = 1;

    use HasFactory;
    protected $table='msg_messages';
    protected $fillable = [
        'conv_id', 'message', 'seen'
    ];
}
