<?php
// Config.class.php

class Config {

    // \Config::FILENAME :: string
    public const FILENAME = '.config';

    // \Config::BOOL_MAP :: [a -> bool]
    // Requires PHP version 5.6 or greater
    public const BOOL_MAP = [
        'true' => true,
        'false' => false,
        'yes' => true,
        'no' => false,
        'on' => true,
        'off' => false
    ];

    // \Config::FILENAME :: [string -> int|float|str|bool]
    public static $config = [];

    // \Config::load :: void -> bool
    public static function load() {

    }
}