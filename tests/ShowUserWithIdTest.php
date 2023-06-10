<?php

use \PHPUnit\Framework\TestCase;
use \app\controllers\UserController;

class ShowUserWithIdTest extends TestCase
{
    public function testUpdateUserData()
    {
        $id = 16;

        $userController = new UserController();

        ob_start();
        $userController->show($id);
        $output = ob_get_clean();

        $this->assertStringContainsString('Yahor Lukyanchyk', $output);
    }
}
