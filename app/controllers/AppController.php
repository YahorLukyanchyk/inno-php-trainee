<?php

namespace app\controllers;

use \core\View;

class AppController extends \core\Controller
{
    public function index()
    {
        View::render('app/index.php');
    }
}
