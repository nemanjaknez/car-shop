<?php

class CarController extends Controller{

    public function index(){
        
        $cars = CarModel::get20();
        
        for ($i=0; $i<count($cars); $i++) {
            $cars[$i]->images = ImageModel::getOneByCarId($cars[$i]->car_id);
            $cars[$i]->models = CarModel::getCarModel($cars[$i]->car_id);
            $cars[$i]->manufacturers = ModelModel::getManufacturersByModel($cars[$i]->model_id);
        }
      
        $this->set('cars', $cars);
        
        $this->set('manufacturers', ManufacturerModel::getAll());
        $this->set('body_style', BodyStyleModel::getAll());
        $this->set('fuel', FuelModel::getAll());
        
        if(isset($_POST['searchBtn'])){
            $this->search();
        }         
    }
    
    public function view($id) {
        
        $c = CarModel::getAll();
        
        for ($i = 0; $i < count($c); $i++) {
            if ($c[$i]->car_id == $id) {
                
                $car = CarModel::getById($id);

                $car->color = CarModel::getCarColor($car->car_id);
                $car->door_number = CarModel::getCarDoorNumber($car->car_id);
                $car->fuel = CarModel::getCarFuel($car->car_id);
                $car->drive = CarModel::getCarDrive($car->car_id);
                $car->body_style = CarModel::getCarBodyStyle($car->car_id);
                $car->registered = CarModel::getCarRegistered($car->car_id);
                $car->transmission = CarModel::getCarTransmission($car->car_id);
                $car->condition = CarModel::getCarCondition($car->car_id);
                $car->equipment = CarModel::getEquipmentOfCar($car->car_id);
                $car->image = ImageModel::getOneByCarId($car->car_id);
                $car->user = CarModel::getCarOwner($car->car_id);
                $car->model = CarModel::getCarModel($car->car_id);
                $car->manufacturer = ModelModel::getManufacturersByModel($car->model_id);

                $this->set('car', $car);               
            }
        }
    }
    
    
    public function search(){

        $model_id = filter_input(INPUT_POST, 'model_id', FILTER_SANITIZE_NUMBER_INT);
        $body_style_id = filter_input(INPUT_POST, 'body_style', FILTER_SANITIZE_NUMBER_INT);
        $fuel_id = filter_input(INPUT_POST, 'fuel', FILTER_SANITIZE_NUMBER_INT);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT);

        $cars = CarModel::homePageSearch($model_id, $body_style_id, $fuel_id, $price);

        for ($i=0; $i<count($cars); $i++) {
            $cars[$i]->images = ImageModel::getOneByCarId($cars[$i]->car_id);
            $cars[$i]->models = CarModel::getCarModel($cars[$i]->car_id);
            $cars[$i]->manufacturers = ModelModel::getManufacturersByModel($cars[$i]->model_id);
        }

        $this->set('cars', $cars);            
    }    
}
