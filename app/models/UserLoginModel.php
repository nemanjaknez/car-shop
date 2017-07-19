<?php

class UserLoginModel implements ModelInterface{

    public static function getAll() {
        $SQL = 'SELECT * FROM user_login ORDER BY `created_at` DESC;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $user_login_id = intval($id);
        $SQL = 'SELECT * FROM user_login WHERE user_login_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute($user_login_id);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    // metod vraca niz prijava korisnika ciji ID je dat kao argument metoda
    public static function getByUserId($user_id) {
        $user_id = intval($user_id);
        $SQL = 'SELECT * FROM user_login WHERE user_id = ? ORDER BY `created_at` DESC;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute($user_id);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
}
