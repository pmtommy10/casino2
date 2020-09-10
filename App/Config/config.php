<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', $_SERVER["DOCUMENT_ROOT"] . DS);
define('APP', ROOT . 'App' . DS);
define('VIEWS', APP . 'Views' . DS);
define('INCLUDES', ROOT . 'includes' . DS);

// Database
$dbConfig = [
    [
        'db_name' => 'tdw_casino-blog',
        'db_username' => 'root',
        'db_password' => 'Rampage28092560',
    ],
];
$selectedDbConfig = $dbConfig[0];

define('DB_HOST', "localhost");
define('DB_NAME', $selectedDbConfig['db_name']);
define('DB_USERNAME', $selectedDbConfig['db_username']);
define('DB_PASSWORD', $selectedDbConfig['db_password']);
