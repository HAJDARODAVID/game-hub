<?php

namespace App\Models\Messenger;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipient extends Model
{
    use HasFactory;
    protected $table='msg_recipients';
    protected $fillable=[
        'conv_id', 'user_id'
    ];
    public $timestamps = false;

    public function getUser(): HasOne{
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
