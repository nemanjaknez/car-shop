<?php

class RegisteredModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM registered;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $registered_id = intval($id);
        $SQL = 'SELECT * FROM registered WHERE registered_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$registered_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    public static function add($registered) {
        $SQL = 'INSERT INTO `registered` (`date`) VALUES (?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$registered]);
    }

    public static function delete($id) {
        $SQL = 'DELETE FROM `registered` WHERE `registered_id` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$id]);
    }    

}




