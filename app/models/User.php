<?php

namespace app\models;

use PDO;
class User extends \core\Model{
    public static function getAllUsers() {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT id, email, name, status, gender FROM users');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getUserById($id){
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT id, email, name, status, gender FROM users WHERE id=$id");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function editUser($data){
        try {
            $db = static::getDB();
            $stmt = $db->query("UPDATE `users` SET email = '$data[email]', name = '$data[name]', gender = '$data[gender]', status = '$data[status]' WHERE id='$data[id]'");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            header('Location: http://localhost/users');
            exit();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function addUser($data){
        try {
            $db = static::getDB();
            $stmt = $db->query("INSERT INTO `users`(`email`, `name`, `gender`, `status`) VALUES ('$data[email]','$data[name]','$data[gender]', '$data[status]')");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            header('Location: http://localhost/users');
            exit();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteUser($id){
        try {
            $db = static::getDB();
            $stmt = $db->query("DELETE FROM `users` WHERE id=$id");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            header('Location: http://localhost/users');
            exit();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}