<?php

class FuelModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM fuel;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $fuel_id = intval($id);
        $SQL = 'SELECT * FROM fuel WHERE fuel_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$fuel_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }

}




