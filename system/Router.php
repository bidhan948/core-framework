<?php

namespace app\system;

class Router
{
    public Request $request;
    protected $routes = [];

    public function __construct(Request $request)
    {
        $this->request = new $request;
    }

    public function get($path,$callback)
    {
        $this->routes['get'][$path] = $callback;    
    }

    public function resolve()
    { 
        $path = $this->request->getPath();
        $method = $this->request->getMethod();  
        $callback = $this->routes[$method][$path] ?? false;
        
        if ($callback == false) {
            return "404 PAGE NOT FOUND !!!";
            exit;
        }
        
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
       return call_user_func($callback);
    }

    public function renderView($view)
    {
        $layoutContent = $this->layoutContent();
        include_once Application::$ROOT_DIR."/Views/$view.php";
    }

    public function layoutContent()
    {
        include_once Application::$ROOT_DIR."/Views/layout/navbar.php";
    }
}