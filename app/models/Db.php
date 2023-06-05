<?php

namespace app\models;

class Db extends \core\Model
{
    public static function setType($type){
        $_SESSION['dbType'] = $type;
    }
}