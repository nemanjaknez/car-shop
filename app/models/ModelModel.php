<?php

class ModelModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM model ORDER BY `model_id`;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    public static function getById($id) {
        $model_id = intval($id);
        $SQL = 'SELECT * FROM model WHERE model_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$model_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    public static function add($model_name, $manufacturer_id) {
        $SQL = 'INSERT INTO `model` (`model_name`, `manufacturer_id`) VALUES (?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$model_name, $manufacturer_id]);
    }
    
    public static function delete($id) {
        $SQL = 'DELETE FROM `model` WHERE `model_id` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$id]);
    }

    public static function getLast() {
        $SQL = 'SELECT model_id FROM model ORDER BY `model_id` DESC LIMIT 1;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    public static function getModelsByManufacturer($manufacturer_id){
        $SQL = 'SELECT * FROM model WHERE manufacturer_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$manufacturer_id]);
        $items = $prep->fetchAll(PDO::FETCH_OBJ);
        $list = [];
        foreach ($items as $item){
            $list[] = ModelModel::getById($item->model_id);
        }
        return $list;
    }
    
    public static function getManufacturersByModel($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM model WHERE model_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        $spisak = $prep->fetchAll(PDO::FETCH_OBJ);
        $list = [];
        foreach ($spisak as $item) {
            $list[] = ManufacturerModel::getById($item->manufacturer_id);
        }
        return $list;
    }    
    
}
