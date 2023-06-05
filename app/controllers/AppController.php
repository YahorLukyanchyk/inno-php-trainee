<?php

namespace app\controllers;

use \core\View;
use \core\Twig as Twig;
use \app\models\Db;

class AppController extends \core\Controller
{
    public function index()
    {
        echo Twig::load()->render("@app/index.php", [
            'title' => 'Home',
        ]);
    }

    public function changeBdType()
    {
        if(isset($_POST['dbType'])) {
            $bdType = $_POST['dbType'];
            echo "Received variable: " . $bdType;
            Db::setType($bdType);
        }
    }
}
