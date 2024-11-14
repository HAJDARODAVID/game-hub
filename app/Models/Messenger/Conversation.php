<?php

namespace App\Models\Messenger;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $table='msg_conversations';
    protected $fillable=[
        'name'
    ];
}
