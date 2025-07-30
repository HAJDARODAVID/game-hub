<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameParam extends Model
{
    use HasFactory;

    protected $table = 'games_params';
    protected $fillable = [
        'p_type',
        'p_value'
    ];
}
