<?php

class ConditionModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM `condition`;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    public static function getById($id) {
        $condition_id = intval($id);
        $SQL = 'SELECT * FROM `condition` WHERE condition_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$condition_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }

}




