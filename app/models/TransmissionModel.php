<?php

class TransmissionModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM transmission;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $transmission_id = intval($id);
        $SQL = 'SELECT * FROM transmission WHERE transmission_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$transmission_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    public static function add($transmission) {
        $SQL = 'INSERT INTO `transmission` (`type`) VALUES (?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$transmission]);
    }  
    
    public static function delete($id) {
        $SQL = 'DELETE FROM `transmission` WHERE `transmission_id` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$id]);
    }     

}




