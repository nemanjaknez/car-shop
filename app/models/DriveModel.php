<?php

class DriveModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM drive;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $drive_id = intval($id);
        $SQL = 'SELECT * FROM drive WHERE drive_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$drive_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }

}
