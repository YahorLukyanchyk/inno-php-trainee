<?php

namespace app\controllers;

use \core\Controller;
use \core\View;
use \app\models\User;
class UserController extends \core\Controller {

    public function index(){
        $users = User::getAllUsers();
        View::render('users/index.php', [
            'users' => $users,
        ]);
    }

    public function show(){
        $user = User::getUserById($this->routeParams['id']);
        View::render('users/show.php', [
            'user' => $user,
        ]);
    }

    public function new(){
        View::render('users/new.php');
    }

    public function create(){
            $userData = $_POST;
            User::addUser($userData);
    }

    public function edit(){
        $user = User::getUserById($this->routeParams['id']);
        View::render('users/edit.php', [
            'user' => $user,
        ]);
    }

    public function update(){
            $putData = file_get_contents('php://input');

            $userData = json_decode("$putData");
            $userData = (array)$userData;

            User::editUser($userData);
    }

    public function delete(){
        User::deleteUser($this->routeParams['id']);
    }
}