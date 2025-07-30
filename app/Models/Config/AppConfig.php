<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppConfig extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'app_config';
    protected $fillable = [
        'config_name',
        'value',
    ];
}
