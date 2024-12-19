<?php

namespace App\Models\GameController;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameOption extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='game_controller_options';
    protected $fillable=[
        'game_id', 'option', 'active'
    ];
}
