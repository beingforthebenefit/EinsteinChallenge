<?php

require __DIR__ . '/Config.class.php';

\Config::load();

echo '<pre>', var_dump(\Config::$config), '</pre>';

// OUTPUT

// array(9) {
//     ["host"]=>
//     string(8) "test.com"
//     ["server_id"]=>
//     int(55331)
//     ["server_load_alarm"]=>
//     float(2.5)
//     ["user"]=>
//     string(4) "user"
//     ["verbose"]=>
//     bool(true)
//     ["test_mode"]=>
//     bool(true)
//     ["debug_mode"]=>
//     bool(false)
//     ["log_file_path"]=>
//     string(16) "/tmp/logfile.log"
//     ["send_notifications"]=>
//     bool(true)
//   }