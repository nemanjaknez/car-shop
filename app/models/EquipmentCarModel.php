<?php

class EquipmentCarModel implements ModelInterface{
    public static function getAll() {
        $SQL = 'SELECT * FROM equipment_car;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $equipment_car_id = intval($id);
        $SQL = 'SELECT * FROM equipment_car WHERE equipment_car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$equipment_car_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    public static function add($equipment_id, $car_id) {
        $SQL = 'INSERT INTO `equipment_car` (`equipment_id`, `car_id`) VALUES (?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$equipment_id, $car_id]);
    } 
    
    public static function delete($id) {
        $SQL = 'DELETE FROM `equipment_car` WHERE `car_id` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$id]);
    }    
}
