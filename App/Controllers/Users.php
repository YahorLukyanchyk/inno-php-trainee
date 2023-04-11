<?php

namespace App\Controllers;

use Core\View;
use App\Models\User;
class Users extends \Core\Controller {

    public function index(){
        echo 'this is users';
    }

    public function getAllUsers(){
        $users = User::getAllUsers();
        View::render('Users/users.php', [
            'users' => $users,
        ]);
    }

    public function getUserById(){
        $user = User::getUserById($this->route_params['id']);
        View::render('Users/user.php', [
            'user' => $user[0],
        ]);
    }

    public function addUserForm(){
        View::render('Users/new.php');
    }

    public function editUserForm(){
        $user = User::getUserById($this->route_params['id']);
        View::render('Users/edit.php', [
            'user' => $user[0],
        ]);
    }

    public function editUser(){
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            $putData = file_get_contents('php://input');

            $user_data = json_decode("$putData");
            $user_data = (array)$user_data;

            User::editUser($user_data);
        }
    }

    public function addUser(){
        $user_data = $_POST;
        User::addUser($user_data);
    }

    public function deleteUser(){
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            User::deleteUser($this->route_params['id']);
        }
    }
}