<?php

namespace app\models;

class Db extends \core\Model
{
    public static function setType($type){
        if (!array_key_exists('dbType', $_SESSION)){
            $_SESSION['dbType'] = 'local';
        }
        $_SESSION['dbType'] = $type;
    }
}