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
            echo "404 PAGE NOT FOUND !!!";
            exit;
        }

       echo call_user_func($callback);
    }
}