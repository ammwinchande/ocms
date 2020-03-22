<?php

namespace App\Core;

// DI
class App
{
    protected static $registry = [];

    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    public static function get($key)
    {
        if (!array_key_exists($key, static::$registry)) {
            throw new Exception("Error, No {$key} is bound in the container", 1);
        }

        return static::$registry[$key];
    }
}
