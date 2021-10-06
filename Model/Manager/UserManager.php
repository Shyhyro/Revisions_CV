<?php

class UserManager
{
    /**
     * Get all User in table user
     */
    public function getAllUser(): ?array
    {
        $array = [];
        $stmt = Database::getInstance()->prepare("SELECT * FROM user");

        if($stmt->execute() && $userDatas = $stmt->fetchAll()) {
            foreach ($userDatas as $userData) {
                $array[] = new User($userData['id'], $userData['username'], $userData['password']);
            }
        }
        return $array;
    }

    /**
     * Search a User in table user for log
     * @param $username
     * @return User
     */
    public function searchUser($username): ?User
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM user  WHERE username = :username LIMIT 1");
        $stmt->bindValue(':username', $username);
        $state = $stmt->execute();
        if($state && $userData = $stmt->fetch())
        {
            $user = new User($userData['id'], $userData['username'], $userData['password']);
        }
        else
        {
            $user = null;
        }
        return $user;
    }

    /**
     * Add a new user
     * @param $username
     * @param $password
     * @return bool
     */
    public function addUser($username, $password) :bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        return $stmt->execute();
    }

}