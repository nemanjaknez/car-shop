<?php

class CarModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM car;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
        
    public static function getById($id) {
        $car_id = intval($id);
        $SQL = 'SELECT * FROM car WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$car_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    public static function get20() {
        $SQL = 'SELECT * FROM car ORDER BY rand() LIMIT 20;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }    
    
    //metod vraca niz objekata sa podacima o opremi koja je dodeljena automobilu ciji je ID prosledjen u vidu argumenta metoda
    public static function getEquipmentOfCar($car_id) { 
        $car_id = intval($car_id);
        $SQL = 'SELECT * FROM equipment_car WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$car_id]);
        $spisak = $prep->fetchAll(PDO::FETCH_OBJ);
        $list = [];
        foreach ($spisak as $item) {
            $list[] = EquipmentModel::getById($item->equipment_id);
        }
        return $list;
    }
    
    public static function getByUserId($user_id) {
        $user_id = intval($user_id);
        $SQL = 'SELECT * FROM car WHERE user_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$user_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    public static function add($model, $price, $title, $drive, $color, $doors, $transmission, $fuel, 
                        $condition, $bodyStyle, $registered, $year, $kilometers, $engineSize, $horsepower, $description, $user_id) {
        $SQL = 'INSERT INTO `car` (`model_id`, `price`, `advertisement_title`, `drive_id`, `color_id`, `door_number_id`, `transmission_id`,'
                            . '`fuel_id`, `condition_id`, `body_style_id`, `registered_id`, `year_of_production`, `kilometers`, '
                            . '`engine_size`, `horsepower`, `description`, '
                            . ' `user_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL); 
        return $prep->execute([$model, $price, $title, $drive, $color, $doors, $transmission, $fuel, 
                        $condition, $bodyStyle, $registered, $year, $kilometers, $engineSize, $horsepower, $description, $user_id]);
    }
    
    public static function delete($id) {
        $SQL = 'DELETE FROM `car` WHERE `car_id` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$id]);
    }

    public static function edit($model, $price, $title, $drive, $color, $doors, $transmission, $fuel, 
                        $condition, $bodyStyle, $registered, $year, $kilometers, $engineSize, $horsepower, $description, $car_id){
        $SQL = 'UPDATE car SET model_id = ?, price = ?, advertisement_title = ?, drive_id = ?, color_id = ?, door_number_id = ?, transmission_id = ?,'
                . 'fuel_id = ?, condition_id = ?, body_style_id = ?, registered_id = ?, year_of_production = ?, kilometers = ?,'
                . 'engine_size = ?, horsepower = ?, description = ? WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL); 
        return $prep->execute([$model, $price, $title, $drive, $color, $doors, $transmission, $fuel, 
                        $condition, $bodyStyle, $registered, $year, $kilometers, $engineSize, $horsepower, $description, $car_id]);
    }


    public static function getCarColor($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM car WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        $spisak = $prep->fetchAll(PDO::FETCH_OBJ);
        $list = [];
        foreach ($spisak as $item) {
            $list[] = ColorModel::getById($item->color_id);
        }
        return $list;
    }
    
    public static function getCarDoorNumber($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM car WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        $spisak = $prep->fetchAll(PDO::FETCH_OBJ);
        $list = [];
        foreach ($spisak as $item) {
            $list[] = DoorNumberModel::getById($item->door_number_id);
        }
        return $list;
    }
    public static function getCarFuel($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM car WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        $spisak = $prep->fetchAll(PDO::FETCH_OBJ);
        $list = [];
        foreach ($spisak as $item) {
            $list[] = FuelModel::getById($item->fuel_id);
        }
        return $list;
    }
    public static function getCarDrive($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM car WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        $spisak = $prep->fetchAll(PDO::FETCH_OBJ);
        $list = [];
        foreach ($spisak as $item) {
            $list[] = DriveModel::getById($item->drive_id);
        }
        return $list;
    }
    public static function getCarBodyStyle($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM car WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        $spisak = $prep->fetchAll(PDO::FETCH_OBJ);
        $list = [];
        foreach ($spisak as $item) {
            $list[] = BodyStyleModel::getById($item->body_style_id);
        }
        return $list;
    }
    public static function getCarRegistered($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM car WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        $spisak = $prep->fetchAll(PDO::FETCH_OBJ);
        $list = [];
        foreach ($spisak as $item) {
            $list[] = RegisteredModel::getById($item->registered_id);
        }
        return $list;
    }
    public static function getCarTransmission($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM car WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        $spisak = $prep->fetchAll(PDO::FETCH_OBJ);
        $list = [];
        foreach ($spisak as $item) {
            $list[] = TransmissionModel::getById($item->transmission_id);
        }
        return $list;
    }
    
    public static function getCarCondition($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM car WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        $spisak = $prep->fetchAll(PDO::FETCH_OBJ);
        $list = [];
        foreach ($spisak as $item) {
            $list[] = ConditionModel::getById($item->condition_id);
        }
        return $list;
    }
    public static function getCarModel($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM car WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        $spisak = $prep->fetchAll(PDO::FETCH_OBJ);
        $list = [];
        foreach ($spisak as $item) {
            $list[] = ModelModel::getById($item->model_id);
        }
        return $list;
    }
    public static function getCarOwner($id) {
        $id = intval($id);
        $SQL = 'SELECT * FROM car WHERE car_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$id]);
        $spisak = $prep->fetchAll(PDO::FETCH_OBJ);
        $list = [];
        foreach ($spisak as $item) {
            $list[] = UserModel::getById($item->user_id);
        }
        return $list;
    }
    
    public static function getLastAddedCar(){
        $SQL = 'SELECT car_id FROM car ORDER BY `car_id` DESC LIMIT 1;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetch(PDO::FETCH_OBJ);
    }
       
    public static function homePageSearch($model_id, $body_style_id, $fuel_id, $price){
        // model, body style, fuel, price
        if ($model_id != -1 and $body_style_id != -1 and $fuel_id != -1 and $price > 0){
            $SQL = 'SELECT * FROM car '
                    . 'WHERE model_id = ? AND body_style_id = ? AND fuel_id = ? AND price BETWEEN 1 AND ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$model_id, $body_style_id, $fuel_id, $price]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }
        
        // model, body style, fuel
        if ($model_id != -1 and $body_style_id != -1 and $fuel_id != -1 and $price <= 0){
            $SQL = 'SELECT * FROM car '
                    . 'WHERE model_id = ? AND body_style_id = ? AND fuel_id = ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$model_id, $body_style_id, $fuel_id]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }
        
        // model, body style, price
        if ($model_id != -1 and $body_style_id != -1 and $fuel_id == -1 and $price > 0){
            $SQL = 'SELECT * FROM car '
                    . 'WHERE model_id = ? AND body_style_id = ? AND price BETWEEN 1 AND ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$model_id, $body_style_id, $price]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }
        
        // model, fuel, price
        if ($model_id != -1 and $body_style_id == -1 and $fuel_id != -1 and $price > 0){
            $SQL = 'SELECT * FROM car '
                    . 'WHERE model_id = ? AND fuel_id = ? AND price BETWEEN 1 AND ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$model_id, $fuel_id, $price]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }
        
        // body style, fuel, price
        if ($model_id == -1 and $body_style_id != -1 and $fuel_id != -1 and $price > 0){
            $SQL = 'SELECT * FROM car '
                    . 'WHERE body_style_id = ? AND fuel_id = ? AND price BETWEEN 1 AND ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$body_style_id, $fuel_id, $price]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }
        
        // model, body style
        if ($model_id != -1 and $body_style_id != -1 and $fuel_id == -1 and $price <= 0){
            $SQL = 'SELECT * FROM car '
                    . 'WHERE model_id = ? AND body_style_id = ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$model_id, $body_style_id]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }
              
        // model, fuel
        if ($model_id != -1 and $body_style_id == -1 and $fuel_id != -1 and $price <= 0){
            $SQL = 'SELECT * FROM car '
                    . 'WHERE model_id = ? AND fuel_id = ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$model_id, $fuel_id]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }
        
        // model, price
        if ($model_id != -1 and $body_style_id == -1 and $fuel_id == -1 and $price > 0){
            $SQL = 'SELECT * FROM car '
                . 'WHERE model_id = ? AND price BETWEEN 1 AND ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$model_id, $price]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }         
      
        // model
        if ($model_id != -1 and $body_style_id == -1 and $fuel_id == -1 and $price <= 0){
            $SQL = 'SELECT * FROM car '
                    . 'WHERE model_id = ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$model_id]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }
        
        // body style, fuel
        if ($model_id == -1 and $body_style_id != -1 and $fuel_id != -1 and $price <= 0){
            $SQL = 'SELECT * FROM car '
                . 'WHERE body_style_id = ? AND fuel_id = ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$body_style_id, $fuel_id]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } 
        
        // body style, price
        if ($model_id == -1 and $body_style_id != -1 and $fuel_id == -1 and $price > 0){
            $SQL = 'SELECT * FROM car '
                . 'WHERE body_style_id = ? AND price BETWEEN 1 AND ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$body_style_id, $price]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } 
                
        // body style
        if ($model_id == -1 and $body_style_id != -1 and $fuel_id == -1 and $price <= 0){
            $SQL = 'SELECT * FROM car '
                . 'WHERE body_style_id = ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$body_style_id]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } 

        // fuel, price
        if ($model_id == -1 and $body_style_id == -1 and $fuel_id != -1 and $price > 0){
            $SQL = 'SELECT * FROM car '
                . 'WHERE fuel_id = ? AND price BETWEEN 1 AND ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$fuel_id, $price]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }        
        
        // fuel
        if ($model_id == -1 and $body_style_id == -1 and $fuel_id != -1 and $price <= 0){
            $SQL = 'SELECT * FROM car '
                . 'WHERE fuel_id = ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$fuel_id]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }    
        // price
        if ($model_id == -1 and $body_style_id == -1 and $fuel_id == -1 and $price > 0){
            $SQL = 'SELECT * FROM car '
                . 'WHERE price BETWEEN 1 AND ? ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute([$price]);
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }
        // empty
        if ($model_id == -1 and $body_style_id == -1 and $fuel_id == -1 and $price <= 0){
            $SQL = 'SELECT * FROM car ORDER BY rand() LIMIT 20;';
            $prep = DataBase::getInstance()->prepare($SQL);
            $prep->execute();
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }                
    }   
}
