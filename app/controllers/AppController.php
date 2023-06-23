<?php

namespace app\controllers;

use \core\View;
use \core\Twig as Twig;
use \app\models\Db;

class AppController
{
    public function index()
    {
        if (!array_key_exists('dbType', $_SESSION)) {
            $bdType = 'local';
            Db::setType($bdType);
        }

        echo Twig::load()->render("@app/index.php", [
            'title' => 'Home',
            'dbType' => $_SESSION['dbType'],
        ]);
    }

    public function changeDbType()
    {
        $bdType = $_POST['dbType'];
        echo "Current database: " . $bdType;
        Db::setType($bdType);
    }
}
