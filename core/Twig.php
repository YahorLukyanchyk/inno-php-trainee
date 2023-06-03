<?php

namespace core;

require_once __DIR__ . "/../vendor/autoload.php";
class Twig
{
    public static function load()
    {
        static $twig = null;

        if ($twig === null){
            $loader = new \Twig\Loader\FilesystemLoader("../app/views/twig");
            $loader->addPath("../app/views/users", 'users');
            $loader->addPath("../app/views/app", 'app');
            $twig = new \Twig\Environment($loader);
        }

        return $twig;
    }
}