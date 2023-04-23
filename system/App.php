<?php

namespace system;

use \core\Router as Router;
class App{

    public static function run($url, $method){
        $router = new Router();

        $router->add('', ['controller' => 'AppController', 'action' => 'index', 'method' => 'GET']);
        $router->add('users', ['controller' => 'UserController', 'action' => 'index', 'method' => 'GET']);
        $router->add('user/{id:\d+}', ['controller' => 'UserController', 'action' => 'show', 'method' => 'GET']);
        $router->add('users/new', ['controller' => 'UserController', 'action' => 'new', 'method' => 'GET']);
        $router->add('users/create', ['controller' => 'UserController', 'action' => 'create', 'method' => 'POST']);
        $router->add('users/edit/{id:\d+}', ['controller' => 'UserController', 'action' => 'edit', 'method' => 'GET']);
        $router->add('users/update', ['controller' => 'UserController', 'action' => 'update', 'method' => 'PUT']);
        $router->add('users/{id:\d+}', ['controller' => 'UserController', 'action' => 'delete', 'method' => 'DELETE']);

        $router->dispatch($url, $method);

    }
}