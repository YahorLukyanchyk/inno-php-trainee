<?php

namespace app\controllers;

use \core\View;
use \core\Twig as Twig;
use \app\models\Db;

class AppController
{
    public function index()
    {
        echo Twig::load()->render("@app/index.php", [
            'title' => 'Home',
            'dbType' => $_SESSION['dbType'],
        ]);
    }

    public function changeDbType()
    {
        if(isset($_SESSION['dbType'])) {
            $bdType = $_POST['dbType'];
            echo "Current database: " . $bdType;
            Db::setType($bdType);
        }
    }
}
