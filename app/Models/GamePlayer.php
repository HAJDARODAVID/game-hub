<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GamePlayer extends Model
{
    use HasFactory;
    protected $table ='game_players';
    protected $fillable = [
        'game_id', 'user_id',
    ];

    public function getUser(): HasOne{
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getGameInstance(): HasMany{
        return $this->hasMany(GameInstance::class, 'id', 'game_id');
    }
}
