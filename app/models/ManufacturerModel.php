<?php

class ManufacturerModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM manufacturer ORDER BY `manufacturer_name`;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $manufacturer_id = intval($id);
        $SQL = 'SELECT * FROM manufacturer WHERE manufacturer_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$manufacturer_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    public static function add($manufacturer) {
        $SQL = 'INSERT INTO `manufacturer` (`manufacturer_name`) VALUES (?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$manufacturer]);
    }

    public static function delete($id) {
        $SQL = 'DELETE FROM `manufacturer` WHERE `manufacturer_id` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$id]);
    }    
    
}
