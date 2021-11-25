<?php

require_once __DIR__ .'./../vendor/autoload.php';

use app\system\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/',function(){
    return 'Hello world';
});

$app->router->get('/','home');
$app->router->get('/contact','contact');

$app->run();