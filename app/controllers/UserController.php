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

    public function show($id = null)
    {
        if ($id === null) {
            $id = $this->routeParams['id'];
        }

        $user = User::get($id);

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
        $userData = (array) json_decode(file_get_contents('php://input'));

        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            exit("Your email is incorrect");
        }

        if (!preg_match("/^[a-zA-Zа-яёА-ЯЁ ]+$/u", $userData['name'])) {
            http_response_code(400);
            exit("Your name does not match a valid pattern");
        }

        User::add($userData);
    }

    public function edit($id = null)
    {
        if ($id === null) {
            $id = $this->routeParams['id'];
        }

        $user = User::get($id);

        View::render('users/edit.php', [
            'user' => $user,
        ]);
    }

    public function update()
    {
        $userData = (array) json_decode(file_get_contents('php://input'));

        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            exit("Your email is incorrect");
        }

        if (!preg_match("/^[a-zA-Zа-яёА-ЯЁ ]+$/u", $userData['name'])) {
            http_response_code(400);
            exit("Your name does not match a valid pattern");
        }

        User::edit($userData);
    }

    public function delete($id = null)
    {
        if ($id === null) {
            $id = $this->routeParams['id'];
        }

        User::delete($id);
    }
}