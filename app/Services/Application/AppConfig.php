<?php

namespace App\Services\Application;

use Illuminate\Support\Facades\Session;

class AppConfig
{
    private $appConfig;

    private function __construct()
    {
        $this->appConfig = Session::get('app_config');
    }

    private function getConfig($name)
    {
        if (key_exists($name, $this->appConfig)) return $this->appConfig[$name];
        return FALSE;
    }

    public static function __callStatic($name, $arguments)
    {
        $obj = new self;
        if (method_exists($obj, $name)) {
            return $obj->$name();
        } else {
            // 1. Replace uppercase letters preceded by a lowercase letter with a hyphen and the lowercase version of the uppercase letter.
            //    Example: 'messengerModule' -> 'messenger-Module'
            $kebabCase = preg_replace('/(?<=[a-z])(?=[A-Z])/', '-', $name);
            // 2. Convert the entire string to lowercase.
            //    Example: 'messenger-Module' -> 'messenger-module'
            $kebabCase = strtolower($kebabCase);
            return $obj->getConfig($kebabCase);
        }
        return NULL;
    }
}
