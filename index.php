<?php

require_once __DIR__ .'/vendor/autoload.php';

use app\system\Application;

$app = new Application();

$app->router->get('/',function(){
    return 'hello wolrd';
});

$app->run();