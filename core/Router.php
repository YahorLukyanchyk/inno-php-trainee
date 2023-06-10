<?php

namespace core;

class Router
{
    protected array $routes = [];
    protected array $params = [];

    public function add($route, $params = [])
    {
        $route = $this->convertRouteToRegularExpression($route);
        $method = $params['method'] ?? 'GET';

        if (!isset($this->routes[$method])) {
            $this->routes[$method] = [];
        }

        $this->routes[$method][$route] = $params;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function match($url, $method)
    {
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $route => $params) {
                if (preg_match($route, $url, $matches)) {
                    foreach ($matches as $key => $match) {
                        if (is_string($key)) {
                            $params[$key] = $match;
                        }
                    }
                    $this->params = $params;
                    return true;
                }
            }
        }

        return false;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function dispatch($url, $method)
    {
        $url = $this->removeQueryStringVariables($url);

        if ($this->match($url, $method)) {

            if ($method !== $this->params['method']) {
                echo "HTTP Method is incorrect";
                return;
            }

            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = "app\controllers\\$controller";

            if (class_exists($controller)) {
                $controllerObject = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (is_callable([$controllerObject, $action])) {

                    $controllerObject->$action($id = $this->params['id'] ?? null);

                } else {
                    echo "Method $action (in controller $controller) not found";
                }
            } else {
                echo "Controller class $controller not found";
            }
        } else {
            echo 'No route matched.';
        }
    }

    protected function convertRouteToRegularExpression($route)
    {
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        return '/^' . $route . '$/i';
    }

    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    protected function removeQueryStringVariables($url)
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);

            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }

        return $url;
    }
}
