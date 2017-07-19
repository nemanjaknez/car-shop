<?php

class SuperAdminModel implements ModelInterface{
    public static function getAll() {
        $SQL = 'SELECT * FROM super_admin;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute();
        if ($res) {
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function getById($id) {
        $SQL = 'SELECT * FROM super_admin WHERE super_admin_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    public static function getByUsernameAndPasswordHash($username, $passwordHash) {
        $SQL = 'SELECT * FROM super_admin WHERE `username` = ? AND `password` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$username, $passwordHash]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    
}


