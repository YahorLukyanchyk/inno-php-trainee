<?php

namespace app\controllers;

use \core\Controller;
use \core\View;
use \app\models\User;

class UserController extends \core\Controller
{

    public function index()
    {
        $users = User::all();

        View::render('users/index.php', [
            'users' => $users,
        ]);
    }

    public function show()
    {
        $user = User::get($this->routeParams['id']);

        View::render('users/show.php', [
            'user' => $user,
        ]);
    }

    public function new()
    {
        View::render('users/new.php');
    }

    public function create()
    {
        $userData = array(
            'email' => $_POST['email'],
            'name' => htmlspecialchars($_POST['name']),
            'gender' => $_POST['gender'],
            'status' => $_POST['status'],
        );

        if ((filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) && (preg_match("/^[a-zA-Zа-яёА-ЯЁ]+$/u", $userData['name']))) {
            User::add($userData);
        } else {
            echo "Please check the input data";
        }
    }

    public function edit()
    {
        $user = User::get($this->routeParams['id']);
        View::render('users/edit.php', [
            'user' => $user,
        ]);
    }

    public function update()
    {
        $userData = (array)json_decode(file_get_contents('php://input'));
        User::edit($userData);
    }

    public function delete()
    {
        User::delete($this->routeParams['id']);
    }
}