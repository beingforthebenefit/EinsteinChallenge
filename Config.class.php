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
        $configFile = fopen(self::FILENAME, 'r');

        while (!feof($configFile)) {
            $line = fgets($configFile);

            // If the line does not begin with a '#' and contains '=' somewhere not at the beginning
            if (
                $line[0] != '#'
                && str_contains($line, '=')
                && $line[0] != '='
            ) {

                // explode on first '=' only
                $parts = explode('=', $line, 2);

                $parts[0] = trim($parts[0]);

                $parts[1] = self::castType(
                    trim($parts[1])
                );

                self::$config[] = $parts;
            }
        }

        return count(self::$config) != 0;
    }

    // \Config::castType :: a -> a
    public static function castType($data) {
        $value = null;

        if (array_key_exists(strtolower($data), self::BOOL_MAP)) {
            $value = self::BOOL_MAP[strtolower($data)];
        } elseif (is_numeric($data)) {
            // If string is entirely numerical (no decimal), cast to integer. Else, cast to float.
            $value = ctype_digit($data) ? (int)$data : (float)$data;
        } else {
            $value = $data;
        }

        return $value;
    }
}