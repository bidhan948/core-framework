<?php

namespace app\Controllers;

use app\system\Application;

class Controller
{
    public string $layout = "navbar";

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    
    public function render($view,$params=[])
    {
       return Application::$app->router->renderView($view, $params);
    }
}

?>