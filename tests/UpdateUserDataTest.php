<?php

use PHPUnit\Framework\TestCase;
use \app\models\User;
class UpdateUserDataTest extends TestCase
{
    public function testUpdateUserData(){
        $userData = [
            'id' => '165',
            'email' => 'asdadasdasdasdads123@mail.ru',
            'name' => 'namefromtest',
            'gender' => 'male',
            'status' => 'active',
        ];

        $response = User::edit($userData);

        $this->assertStringContainsString('User updated successfully!', $response);
    }
}