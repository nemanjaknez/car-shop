<?php

class DoorNumberModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM door_number;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $door_number_id = intval($id);
        $SQL = 'SELECT * FROM door_number WHERE door_number_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$door_number_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }

}



