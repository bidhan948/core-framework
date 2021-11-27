<?php

namespace app\system;

use app\Controllers\Controller;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public static Application $app;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        self::$app = $this;
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);
    }

    public function run()
    {
        echo $this->router->resolve();   
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController(Controller $controller)
    {
        return $this->controller = $controller;
    }
}
