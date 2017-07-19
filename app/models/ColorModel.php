<?php

class ColorModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM color;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $color_id = intval($id);
        $SQL = 'SELECT * FROM color WHERE color_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$color_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    public static function add($color) {
        $SQL = 'INSERT INTO `color` (`name`) VALUES (?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$color]);
    }    
    
    public static function delete($id) {
        $SQL = 'DELETE FROM `color` WHERE `color_id` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$id]);
    }    

}


