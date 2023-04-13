<?php

namespace system;

use core\Router as Router;
class App{

    public static function run($url){
        $router = new Router();

        $router->add('', ['controller' => 'AppController', 'action' => 'index']);
        $router->add('users', ['controller' => 'UserController', 'action' => 'index']);
        $router->add('users/{id:\d+}', ['controller' => 'UserController', 'action' => 'idHandle']);
        $router->add('users/new', ['controller' => 'UserController', 'action' => 'new']);
        $router->add('users/create', ['controller' => 'UserController', 'action' => 'create']);
        $router->add('users/edit/{id:\d+}', ['controller' => 'UserController', 'action' => 'edit']);
        $router->add('users/update', ['controller' => 'UserController', 'action' => 'update']);

        $router->dispatch($_SERVER['QUERY_STRING']);

    }
}