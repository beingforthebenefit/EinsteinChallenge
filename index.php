<?php

require __DIR__ . '/Config.class.php';

\Config::load();

echo '<pre>', var_dump(\Config::$config), '</pre>';