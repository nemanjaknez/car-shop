<?php

class UserModel implements ModelInterface{
    public static function getAll() {
        $SQL = 'SELECT * FROM user;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute();
        if ($res) {
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function getById($id) {
        $SQL = 'SELECT * FROM user WHERE user_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    public static function getByUsernameAndPasswordHash($username, $passwordHash) {
        $SQL = 'SELECT * FROM user WHERE `username` = ? AND `password` = ? AND active = 1;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$username, $passwordHash]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
    public static function add($email, $hash, $forename, $surname, $address, $phone) {
        $SQL = 'INSERT INTO `user` (`username`, `password`, `forename`, `surname`, `address`, `phone`) VALUES (?, ?, ?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$email, $hash, $forename, $surname, $address, $phone]);
    }
    
    public static function edit($active, $user_id){
        $SQL = 'UPDATE user SET active = ? WHERE user_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$active, $user_id]);
    }
}
