<?php

use \PHPUnit\Framework\TestCase;
use \app\controllers\UserController;
class DeleteUserTest extends TestCase
{
    public function testDeleteUser()
    {
        $id = "172";

        $userController = new UserController();

        ob_start();
        $userController->delete($id);
        $output = ob_get_clean();

        $this->assertStringContainsString('User removed successfully!', $output);
    }
}