<?php

namespace app\controllers;

use core\View;
use app\models\User;
class UserController extends \core\Controller {

    public function index(){
        $users = User::getAllUsers();
        View::render('users/index.php', [
            'users' => $users,
        ]);
    }

    public function idHandle(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            self::show($this->route_params['id']);
        } else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            self::delete($this->route_params['id']);
        } else {
            header("location:javascript://history.go(-1)");
        }
    }

    public static function show($id){
        $user = User::getUserById($id);
        View::render('users/show.php', [
            'user' => $user[0],
        ]);
    }

    public function new(){
        View::render('users/new.php');
    }

    public function create(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_data = $_POST;
            User::addUser($user_data);
        } else {
            header("location:javascript://history.go(-1)");
        }
    }

    public function edit(){
        $user = User::getUserById($this->route_params['id']);
        View::render('users/edit.php', [
            'user' => $user[0],
        ]);
    }

    public function update(){
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            $putData = file_get_contents('php://input');

            $user_data = json_decode("$putData");
            $user_data = (array)$user_data;

            User::editUser($user_data);
        } else {
            header("location:javascript://history.go(-1)");
        }
    }

    public function delete($id){
        User::deleteUser($id);
    }
}