<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameInstance extends Model
{
    const STATUS_OPEN = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_FINISHED = 3;
    const STATUS_DISABLED = -1;

    use HasFactory;
    
    protected $table = 'game_instances';
    protected $fillable = [
        'game_id', 'status', 'created_by', 
    ];

    public function getPlayer(): HasOne{
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function getGame(): HasOne{
        return $this->hasOne(Game::class, 'id', 'game_id');
    }

    public function getGamePlayers(): HasMany{
        return $this->hasMany(GamePlayer::class, 'game_id', 'id');
    }
}
