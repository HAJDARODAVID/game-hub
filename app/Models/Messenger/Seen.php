<?php

namespace App\Models\Messenger;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seen extends Model
{
    use HasFactory;
    protected $table='msg_messages_seen';
    protected $fillable=[
        'user_id', 'msg_id'
    ];
    public $timestamps = false;

}
