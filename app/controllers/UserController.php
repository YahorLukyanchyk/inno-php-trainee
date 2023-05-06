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

        View::render('users/index.php', 'main.php', [
            'users' => $users,
            'page' => ['title' => 'All users'],
        ]);
    }

    public function show($id)
    {
        $user = User::get($id);

        View::render('users/show.php', 'main.php', [
            'user' => $user,
            'page' => ['title' => 'User by ID'],
        ]);
    }

    public function new()
    {
        View::render('users/new.php', 'main.php', [
            'page' => ['title' => 'Add user'],
        ]);
    }

    public function create()
    {
        $userData = (array)json_decode(file_get_contents('php://input'));

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

    public function edit($id)
    {
        $user = User::get($id);

        View::render('users/edit.php', 'main.php', [
            'user' => $user,
            'page' => ['title' => 'Edit user'],
        ]);
    }

    public function update()
    {
        $userData = (array)json_decode(file_get_contents('php://input'));

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

    public function delete($id)
    {
        User::delete($id);
    }
}