<?php

class BodyStyleModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM body_style;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $body_style_id = intval($id);
        $SQL = 'SELECT * FROM body_style WHERE body_style_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$body_style_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }

}


