<?php

spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);   // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});

$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('users', ['controller' => 'Users', 'action' => 'getAllUsers']);
$router->add('users/{id:\d+}', ['controller' => 'Users', 'action' => 'userAction']);
$router->add('users/{id:\d+}/edit', ['controller' => 'Users', 'action' => 'editUserForm']);
$router->add('users/new', ['controller' => 'Users', 'action' => 'addUserForm']);
$router->add('{controller}/{id:\d+}/{action}');
    
$router->dispatch($_SERVER['QUERY_STRING']);