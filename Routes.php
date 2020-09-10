<?php

use App\Core\Controller;

$router = new AltoRouter();

$router->addRoutes([
    [ 'GET', '/'.urlencode('ติดต่อเรา'), 'PageController::contact' ],
    [ 'GET', '/'.urlencode('โปรโมชั่น'), 'PageController::promotion' ],
    [ 'GET', '/'.urlencode('แทงบอล'), 'PageController::football' ],
    [ 'GET', '/'.urlencode('สล็อต'), 'PageController::slot' ],
    [ 'GET', '/'.urlencode('บาคาร่า'), 'PageController::bacara' ],
    [ 'GET', '/'.urlencode('คาสิโน'), 'PageController::casino' ],
    [ 'GET', '/'.urlencode('สมัครสมาชิก'), 'PageController::register' ],
    [ 'GET', '/'.urlencode('บทความ').'/[i:pageNo]?', 'PageController::articles' ],
    [ 'GET', '/'.urlencode('บทความ').'/[*:articleSlug]', 'PageController::showArticle' ],
    [ 'GET', '/', 'PageController::index' ],
]);

$match = $router->match();

if ($match && !is_callable($match['target'])) {
    $match['target'] = 'App\Controllers\\'.$match['target'];
}

// print_r($match); die();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    Controller::createView('404', [
        'pageHeader' => [
            'pageTitle' => '404 ไม่พบหน้าที่ระบุ',
            'pageDesc' => '',
            'url' => '',
        ],
        'partnerInContainer' => true,
    ]);
    // require VIEWS . '404.php';
}
