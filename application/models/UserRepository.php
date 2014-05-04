<?php
/**
 * Created by PhpStorm.
 * User: junko
 * Date: 2014/04/29
 * Time: 23:13
 */


class UserRepository extends DbRepository
{
    const SALT = 'SecretKey';
    public function insert($user_name, $password)
    {
        $password = $this->hashPassword($password);
        $now = new DateTime();
        $sql = "INSERT INTO user(user_name, password, created_at)
                VALUES(:user_name, :password, :created_at)";
        $stmt = $this->execute($sql, array(
            ':user_name' => $user_name,
            ':password' => $password,
            ':created_at' => $now->format('Y-m-d H:i:s'),
        ));
    }
    public function hashPassword($password)
    {
        $ret = $password . UserRepository::SALT;
        for($i = 0; $i < 1000; $i++)
        {
            $ret = sha1($ret);
        }
        return $ret;
    }
    public function fetchByUserName($user_name)
    {
        $sql = "SELECT * FROM user WHERE user_name = :user_name";
        return $this->fetch($sql, array(':user_name' => $user_name));
    }
    public function isUniqueUserName($user_name)
    {
        $sql = "SELECT COUNT(id) as count FROM user WHERE user_name = :user_name";
        $row = $this->fetch($sql, array(':user_name' => $user_name));
        if($row['count'] === '0')
        {
            return true;
        }
        return false;
    }
    public function fetchAllFollowingsByUserId($user_id)
    {
        $sql = "SELECT u.*
                    FROM user u
                        LEFT JOIN following f ON f.following_id = u.id
                    WHERE f.user_id = :user_id";
        return $this->fetchAll($sql, array(':user_id' => $user_id));
    }
} 