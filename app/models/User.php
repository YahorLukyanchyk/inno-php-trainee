<?php

namespace app\models;

use PDO;

class User extends \core\Model
{
    public static function all()
    {
        try {
            $db = static::getDB();
            $sql = 'SELECT id, email, name, status, gender FROM users';
            $stmt = $db->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function get($id)
    {
        try {
            $db = static::getDB();
            $sql = 'SELECT id, email, name, status, gender FROM users WHERE id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function edit($data)
    {
        try {
            $db = static::getDB();
            $sql = 'UPDATE users SET email = :email, name = :name, gender = :gender, status = :status WHERE id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $id);

            $email = $data['email'];
            $name = $data['name'];
            $gender = $data['gender'];
            $status = $data['status'];
            $id = $data['id'];
            $stmt->execute();
            header('Location: http://localhost/users?page=0');

            exit();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function add($data)
    {
        try {
            $db = static::getDB();
            $sql = 'INSERT INTO users(email, name, gender, status) VALUES (:email, :name, :gender, :status)';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':status', $status);

            $email = $data['email'];
            $name = $data['name'];
            $gender = $data['gender'];
            $status = $data['status'];
            $stmt->execute();
            header('Location: http://localhost/users?page=0');

            exit();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function delete($id)
    {
        try {
            $db = static::getDB();
            $sql = 'DELETE FROM users WHERE id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            header('Location: http://localhost/users?page=0');

            exit();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteSelected($usersIdToRemove)
    {
        try {
            $db = static::getDB();
            foreach ($usersIdToRemove as $key => $id)
                {
                    $sql = 'DELETE FROM users WHERE id = :id';
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':id', $id);

                    $stmt->execute();
                }

            header('Location: http://localhost/users?page=0');

            exit();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}