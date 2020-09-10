<?php
define("DS", DIRECTORY_SEPARATOR);
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . DS);
define('INCLUDES', ROOT . 'includes' . DS);
define('VIEWS', ROOT . 'views' . DS);

require __DIR__ . '/vendor/autoload.php';

$router = new AltoRouter();
global $router;

$router->addRoutes([
    [ 'GET', '/'.urlencode('ติดต่อเรา'), function() { require VIEWS . 'contact.php'; } ],
    [ 'GET', '/'.urlencode('โปรโมชั่น'), function() { require VIEWS . 'promotion.php'; } ],
    [ 'GET', '/'.urlencode('แทงบอล'), function() { require VIEWS . 'football.php'; } ],
    [ 'GET', '/'.urlencode('สล็อต'), function() { require VIEWS . 'slot.php'; } ],
    [ 'GET', '/'.urlencode('บาคาร่า'), function() { require VIEWS . 'bacara.php'; } ],
    [ 'GET', '/'.urlencode('คาสิโน'), function() { require VIEWS . 'casino.php'; } ],
    [ 'GET', '/'.urlencode('สมัครสมาชิก'), function() { require VIEWS . 'register.php'; } ],
    [ 'GET', '/', function() { require VIEWS . 'index.php'; } ],
]);

$match = $router->match();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    require VIEWS . '404.php';
}
