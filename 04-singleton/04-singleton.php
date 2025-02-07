<?php

class Singleton
{
    private static $singleton;

    private function __construct()
    {
    }

    public static function create()
    {
        if (self::$singleton == null) {
            self::$singleton = new self();
        }

        return self::$singleton;
    }
}

$a = Singleton::create();
$b = Singleton::create();

// Singleton {#2195}
// Singleton {#2195}

