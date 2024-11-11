<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = -1;

    const STATUSES_EN = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_DISABLED => 'Disabled',
    ];

    protected $table = 'games';
    protected $fillable = [
        'title', 'name', 'status', 'cover'
    ];
}
