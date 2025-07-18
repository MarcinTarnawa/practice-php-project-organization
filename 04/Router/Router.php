<?php

namespace Router;

class Router {

    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }
     
    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }
     
    public function delete($uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);
    }
     
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }

    protected function abort($code = 404) {

        http_response_code($code);
    
        require base_path("views/{$code}.php");
     
        die();
    }
}