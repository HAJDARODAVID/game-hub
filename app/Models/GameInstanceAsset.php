<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameInstanceAsset extends Model
{
    use HasFactory;

    protected $table = 'game_inst_assets';
    protected $fillable = [
        'game_inst',
        'a_name',
        'a_value',
        'a_value_2',
        'a_value_3',
    ];

    public $timestamps = FALSE;
}
