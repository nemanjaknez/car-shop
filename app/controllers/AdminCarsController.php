<?php

class AdminCarsController extends AdminController{
    
    public function index() {
        $cars = CarModel::getByUserId(Session::get('user_id'));
        
        for ($i=0; $i<count($cars); $i++) {
            $cars[$i]->images = ImageModel::getOneByCarId($cars[$i]->car_id);
            $cars[$i]->models = CarModel::getCarModel($cars[$i]->car_id);
            $cars[$i]->manufacturers = ModelModel::getManufacturersByModel($cars[$i]->model_id);            
        }
        
        $this->set('cars', $cars);
        
        if (isset($_POST['deleteCar'])) {
            $this->delete();
        }
    }
    
    public function add() {
        
        $this->set('manufacturers', ManufacturerModel::getAll());
        $this->set('models', ModelModel::getAll());
        $this->set('transmission', TransmissionModel::getAll());
        $this->set('registered', RegisteredModel::getAll());
        $this->set('colors', ColorModel::getAll());
        $this->set('equipment', EquipmentModel::getAll());
        $this->set('fuel', FuelModel::getAll());
        $this->set('drive', DriveModel::getAll());
        $this->set('door_number', DoorNumberModel::getAll());
        $this->set('condition', ConditionModel::getAll());
        $this->set('body_style', BodyStyleModel::getAll());
        
        if (isset($_POST['addCar'])) {
            $manufacturer = filter_input(INPUT_POST, 'manufacturer_id', FILTER_SANITIZE_NUMBER_INT);
            $model = filter_input(INPUT_POST, 'model_id', FILTER_SANITIZE_NUMBER_INT);
            $condition = filter_input(INPUT_POST, 'condition', FILTER_SANITIZE_NUMBER_INT);
            $price = floatval(filter_input(INPUT_POST, 'price'));
            $year = filter_input(INPUT_POST, 'year');
            $kilometers = filter_input(INPUT_POST, 'kilometers', FILTER_SANITIZE_NUMBER_INT);
            $bodyStyle = filter_input(INPUT_POST, 'body_style', FILTER_SANITIZE_NUMBER_INT);
            $fuel = filter_input(INPUT_POST, 'fuel', FILTER_SANITIZE_NUMBER_INT);
            $engineSize = filter_input(INPUT_POST, 'engineSize', FILTER_SANITIZE_NUMBER_INT);
            $horsepower = filter_input(INPUT_POST, 'horsepower', FILTER_SANITIZE_NUMBER_INT);
            $transmission = filter_input(INPUT_POST, 'transmission', FILTER_SANITIZE_NUMBER_INT);
            $drive = filter_input(INPUT_POST, 'drive', FILTER_SANITIZE_NUMBER_INT);
            $doors = filter_input(INPUT_POST, 'door_number', FILTER_SANITIZE_NUMBER_INT);
            $color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_NUMBER_INT);
            $registered = filter_input(INPUT_POST, 'registered', FILTER_SANITIZE_NUMBER_INT);
            $title = filter_input(INPUT_POST, 'title');
            $description = filter_input(INPUT_POST, 'description');
            
            if (!preg_match('/^.{4,64}$/', $title) or !preg_match('/^(19|20)([0-9]{2})$/', $year) or 
                    !preg_match('/^[0-9]{3,5}$/', $engineSize) or !preg_match('/^[0-9]{1,3}$/', $horsepower) or
                    !preg_match('/^[0-9]{1,7}$/', $kilometers) or !preg_match('/^[0-9]{1,7}$/', $price)) {
                $this->set('message', 'Podaci nisu uneti u ispravnom formatu!');
                return;
            }            
            
            if ( $manufacturer == '' or $model == '' or $condition == '' or $price == 0 or $year == '' or $registered == '' 
                    or $kilometers == '' or $engineSize == '' or $horsepower == '' or $color == '' or $doors == '' 
                    or $fuel == '' or $drive == '' or $transmission == ''
                    or $bodyStyle == '' or $title ==  '' or $description == '') {
                $this->set('message', 'Invalid values sent!');
            } else {                                
                
                $res = CarModel::add($model, $price, $title, $drive, $color, $doors, $transmission, $fuel, 
                        $condition, $bodyStyle, $registered, $year, $kilometers, $engineSize, $horsepower, $description, Session::get('user_id'));
                if ($res) {
                    Misc::redirect('imageAndEquipment/add/');
                } else {
                    $this->set('message', 'Could not add a new car!');
                }
            }
        }
    }
    
    public function edit($id) {
            
        $car = CarModel::getById($id);  
        
        $car->model = CarModel::getCarModel($car->car_id);
        $car->manufacturer = ModelModel::getManufacturersByModel($car->model_id);
        
        if ($car->user_id != Session::get('user_id')){
            Misc::redirect('cars/');
        }
        
        if (!$car) {
            Misc::redirect('cars/');
        }          
        $this->set('car', $car);    
        $this->set('manufacturers', ManufacturerModel::getAll());
        $this->set('models', ModelModel::getAll());
        $this->set('transmission', TransmissionModel::getAll());
        $this->set('registered', RegisteredModel::getAll());
        $this->set('colors', ColorModel::getAll());
        $this->set('fuel', FuelModel::getAll());
        $this->set('drive', DriveModel::getAll());
        $this->set('door_number', DoorNumberModel::getAll());
        $this->set('condition', ConditionModel::getAll());
        $this->set('body_style', BodyStyleModel::getAll());   

        if (isset($_POST['editCar'])) {
            $manufacturer = filter_input(INPUT_POST, 'manufacturer_id', FILTER_SANITIZE_NUMBER_INT);
            $model = filter_input(INPUT_POST, 'model_id', FILTER_SANITIZE_NUMBER_INT);
            $condition = filter_input(INPUT_POST, 'condition', FILTER_SANITIZE_NUMBER_INT);
            $price = floatval(filter_input(INPUT_POST, 'price'));
            $year = filter_input(INPUT_POST, 'year');
            $kilometers = filter_input(INPUT_POST, 'kilometers', FILTER_SANITIZE_NUMBER_INT);
            $bodyStyle = filter_input(INPUT_POST, 'body_style', FILTER_SANITIZE_NUMBER_INT);
            $fuel = filter_input(INPUT_POST, 'fuel', FILTER_SANITIZE_NUMBER_INT);
            $engineSize = filter_input(INPUT_POST, 'engineSize', FILTER_SANITIZE_NUMBER_INT);
            $horsepower = filter_input(INPUT_POST, 'horsepower', FILTER_SANITIZE_NUMBER_INT);
            $transmission = filter_input(INPUT_POST, 'transmission', FILTER_SANITIZE_NUMBER_INT);
            $drive = filter_input(INPUT_POST, 'drive', FILTER_SANITIZE_NUMBER_INT);
            $doors = filter_input(INPUT_POST, 'door_number', FILTER_SANITIZE_NUMBER_INT);
            $color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_NUMBER_INT);
            $registered = filter_input(INPUT_POST, 'registered', FILTER_SANITIZE_NUMBER_INT);
            $title = filter_input(INPUT_POST, 'title');
            $description = filter_input(INPUT_POST, 'description');
            
            if (!preg_match('/^.{4,64}$/', $title) or !preg_match('/^(19|20)([0-9]{2})$/', $year) or 
                    !preg_match('/^[0-9]{3,5}$/', $engineSize) or !preg_match('/^[0-9]{1,3}$/', $horsepower) or
                    !preg_match('/^[0-9]{1,7}$/', $kilometers) or !preg_match('/^[0-9]{1,7}$/', $price)) {
                $this->set('message', 'Podaci nisu uneti u ispravnom formatu!');
                return;
            }            

            if ( $manufacturer == '' or $model == '' or $condition == '' or $price == 0 or $year == '' or $registered == '' 
                    or $kilometers == '' or $engineSize == '' or $horsepower == '' or $color == '' or $doors == '' 
                    or $fuel == '' or $drive == '' or $transmission == ''
                    or $bodyStyle == '' or $title ==  '' or $description == '') {
                $this->set('message', 'Invalid values sent!');
            } else {                                

                $res = CarModel::edit($model, $price, $title, $drive, $color, $doors, $transmission, $fuel, 
                        $condition, $bodyStyle, $registered, $year, $kilometers, $engineSize, $horsepower, $description, $id);
                if ($res) {
                    Misc::redirect('imageAndEquipment/edit/' . $id);
                } else {
                    $this->set('message', 'Could not edit this car!');
                }
            }
        }                         
    }
    
    public function delete(){
        

        $carID = filter_input(INPUT_POST, 'carID', FILTER_SANITIZE_NUMBER_INT);
        $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);

        $car = CarModel::getById($carID);
        if ($car->user_id != Session::get('user_id')){
            Misc::redirect('cars');
        }

        if ($confirmed == 1) {
            $res1 = ImageModel::delete($carID);
            $res2 = EquipmentCarModel::delete($carID);
            $res3 = CarModel::delete($carID);

            if ($res1 and $res2 and $res3) {
                Misc::redirect('cars');
            }
        }
    }
    
}
