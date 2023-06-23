<?php

namespace app\models;

use PDO;

class User extends \core\Model
{
    public static function all()
    {
        if ($_SESSION['dbType'] == 'remote') {
            $url = 'https://gorest.co.in/public/v2/users';
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);

            return json_decode($response, true);
        } else {
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
    }

    public static function get($id)
    {
        if ($_SESSION['dbType'] == 'remote') {
            $url = "https://gorest.co.in/public/v2/users/$id";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);

            return json_decode($response, true);
        } else {
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
    }

    public static function edit($data)
    {
        if ($_SESSION['dbType'] == 'remote') {
            $id = $data['id'];
            $url = "https://gorest.co.in/public/v2/users/$id";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer fdb2e0d938496f83d1d6580506ad831133697ca5bb27f312734bbcd07fc6742f'
            ]);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            $response = curl_exec($curl);
            curl_close($curl);

            return json_decode($response, true);
        } else {
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

                return 'User updated successfully!';
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    public static function add($data)
    {
        if ($_SESSION['dbType'] == 'remote') {
            $url = "https://gorest.co.in/public/v2/users";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer fdb2e0d938496f83d1d6580506ad831133697ca5bb27f312734bbcd07fc6742f',
            ]);

            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);

            return json_decode($response, true);
        } else {
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

                return 'User created successfully!';
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    public static function delete($id)
    {
        if ($_SESSION['dbType'] == 'remote') {
            $url = "https://gorest.co.in/public/v2/users/$id";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer fdb2e0d938496f83d1d6580506ad831133697ca5bb27f312734bbcd07fc6742f'
            ]);
            $response = curl_exec($curl);
            curl_close($curl);

            return json_decode($response, true);
        } else {
            try {
                $db = static::getDB();
                $sql = 'DELETE FROM users WHERE id = :id';
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id', $id);

                $stmt->execute();

                return 'User removed successfully!';
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}