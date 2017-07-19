<?php

class ImageModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM image;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id) {
        $image_id = intval($id);
        $SQL = 'SELECT * FROM image WHERE image_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$image_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    public static function getByCarId($car_id) {
        $car_id = intval($car_id);
        $SQL = 'SELECT * FROM image WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$car_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    public static function getOneByCarId($car_id) {
        $car_id = intval($car_id);
        $SQL = 'SELECT * FROM image WHERE car_id = ? ORDER BY `datetime` ASC LIMIT 1;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$car_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    public static function add($path, $car_id){
        $SQL = 'INSERT INTO image (path, car_id) VALUES (?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$path, $car_id]);
    }
    
    public static function delete($id) {
        $SQL = 'DELETE FROM `image` WHERE `car_id` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$id]);
    }  
    
    public static function edit($car_id, $path){
        $SQL = 'UPDATE image SET path = ? WHERE car_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$path, $car_id]);
    }

}
