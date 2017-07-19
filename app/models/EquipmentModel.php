<?php

class EquipmentModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM equipment;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $equipment_id = intval($id);
        $SQL = 'SELECT * FROM equipment WHERE equipment_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$equipment_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }

    //metod vraca niz objekata koji sadrze podatke o automobilima koji imaju opremu sa ID-em koji je dat kao argument metoda    
    public static function getCarsEquipment($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM equipment_car WHERE equipment_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute($id);
        $spisak = $prep->fetchAll(PDO::FETCH_OBJ);
        $list = [];
        foreach ($spisak as $item) {
            $list[] = CarModel::getById($item->car_id);
        }
        return $list;
    }
    
    public static function add($equipment) {
        $SQL = 'INSERT INTO `equipment` (`name`) VALUES (?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$equipment]);
    }    
    
    public static function delete($id) {
        $SQL = 'DELETE FROM `equipment` WHERE `equipment_id` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$id]);
    }    
}
