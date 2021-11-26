<?php

namespace app\system;

class Router
{
    public Request $request;
    public Response $response;
    protected $routes = [];

    public function __construct(Request $request,Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path,$callback)
    {
        $this->routes['get'][$path] = $callback;    
    }
    
    public function post($path,$callback)
    {
        $this->routes['post'][$path] = $callback;    
    }

    public function resolve()
    { 
        $path = $this->request->getPath();
        $method = $this->request->getMethod();  
        $callback = $this->routes[$method][$path] ?? false;
        
        if ($callback == false) {
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
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
        $viewContent = $this->renderOnyView($view);
        return str_replace('{{content}}',$viewContent,$layoutContent);
    }
    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}',$viewContent,$layoutContent);
    }

    public function layoutContent()
    {
        ob_clean();
        include_once Application::$ROOT_DIR."/Views/layout/navbar.php";
        return ob_get_clean();
    }
    
    public function renderOnyView($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR."/Views/$view.php";
        return ob_get_clean();
    }
}