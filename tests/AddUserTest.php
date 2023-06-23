<?php

use \PHPUnit\Framework\TestCase;
use \app\models\User;
class AddUserTest extends TestCase
{
    public function testCreateUser(){
        $userData = [
            'email' => 'createduser@mail.ru',
            'name' => 'createduser',
            'gender' => 'female',
            'status' => 'inactive',
        ];

        $response = User::add($userData);

        $this->assertStringContainsString('User created successfully!', $response);
    }
}