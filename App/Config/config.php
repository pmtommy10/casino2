<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', $_SERVER["DOCUMENT_ROOT"] . DS);
define('APP', ROOT . 'App' . DS);
define('VIEWS', APP . 'Views' . DS);
define('INCLUDES', ROOT . 'includes' . DS);
define('UPLOADS', ROOT . DS . 'uploads' . DS);

// Database
$dbConfig = [
    [
        'db_name' => 'TDW_Casino-Blog',
        'db_username' => 'root',
        'db_password' => 'Rampage28092560',
    ],
];
$selectedDbConfig = $dbConfig[0];

define('DB_HOST', "localhost");
define('DB_NAME', $selectedDbConfig['db_name']);
define('DB_USERNAME', $selectedDbConfig['db_username']);
define('DB_PASSWORD', $selectedDbConfig['db_password']);

// Optional
date_default_timezone_set('Asia/Bangkok');