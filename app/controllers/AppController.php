<?php

namespace app\controllers;

use \core\View;
use \core\Twig as Twig;

class AppController extends \core\Controller
{
    public function index()
    {
        echo Twig::load()->render("@app/index.php", [
            'title' => 'Home',
        ]);
    }
}
