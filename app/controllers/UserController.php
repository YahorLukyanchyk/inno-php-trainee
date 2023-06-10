<?php

namespace app\controllers;

use \core\Controller;
use \core\View;
use \core\Twig as Twig;
use \app\models\User;

class UserController
{
    public function index()
    {
        $users = User::all();

        $page = $_GET['page'];
        $usersPerPage = $_GET['per_page'];
        $pagesCount = ceil(count($users) / $usersPerPage);

        echo Twig::load()->render('@users/index.php', [
            'title' => 'All users',
            'users' => $users,
            'page' => $page,
            'usersPerPage' => $usersPerPage,
            'pagesCount' => $pagesCount,
        ]);
    }

    public function show($id)
    {
        $user = User::get($id);

        echo Twig::load()->render('@users/show.php', [
            'title' => 'User by ID',
            'user' => $user,
        ]);
    }

    public function new()
    {
        echo Twig::load()->render('@users/new.php', [
            'title' => 'Add user',
        ]);
    }

    public function create()
    {
        $userData = (array)json_decode(file_get_contents('php://input'));

        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            exit('Your email is incorrect');
        }

        if (!preg_match("/^[a-zA-Zа-яёА-ЯЁ ]+$/u", $userData['name'])) {
            http_response_code(400);
            exit('Your name does not match a valid pattern');
        }

        User::add($userData);
    }

    public function edit($id)
    {
        $user = User::get($id);

        echo Twig::load()->render('@users/edit.php', [
            'title' => 'Edit user',
            'user' => $user,
        ]);
    }

    public function update()
    {
        $userData = (array)json_decode(file_get_contents('php://input'));

        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            exit('Your email is incorrect');
        }

        if (!preg_match("/^[a-zA-Zа-яёА-ЯЁ ]+$/u", $userData['name'])) {
            http_response_code(400);
            exit('Your name does not match a valid pattern');
        }

        User::edit($userData);
    }

    public function delete($id)
    {
        User::delete($id);

        echo 'User removed successfully!';
    }
}