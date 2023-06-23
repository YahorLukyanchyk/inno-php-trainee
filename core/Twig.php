<?php

namespace core;

class Twig
{
    public static function load()
    {
        static $twig = null;

        if ($twig === null){
            $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../app/views/twig");
            $loader->addPath(__DIR__ . "/../app/views/users", 'users');
            $loader->addPath(__DIR__ . "/../app/views/app", 'app');
            $twig = new \Twig\Environment($loader);
        }

        return $twig;
    }
}