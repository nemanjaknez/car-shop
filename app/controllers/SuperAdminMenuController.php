<?php

class SuperAdminMenuController extends SuperAdminController{

    public function index(){
                
    }
    
    public function userAccounts(){
        $this->set('users', UserModel::getAll()); 
        
        if (isset($_POST['editUserAccount'])) {
        
            $userID = filter_input(INPUT_POST, 'userID', FILTER_SANITIZE_NUMBER_INT);
            $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);
            
            $user = UserModel::getById($userID);
            
            if ($confirmed == 1 and $user->active == 'y') {
                UserModel::edit('n', $userID); 
            } elseif ($confirmed == 1 and $user->active == 'n') {
                UserModel::edit('y', $userID);
            }           
            Misc::redirect('superAdmin/userAccounts/');
        }        
    }
    
    public function manufacturers(){
        $this->set('manufacturers', ManufacturerModel::getAll());    
        
        if (isset($_POST['deleteManufacturer'])) {
            $this->deleteManufacturer();
        }        
    }
    public function models(){
        
        $models = ModelModel::getAll();
        
        for ($i=0; $i<count($models); $i++) {
            $models[$i]->manufacturers = ModelModel::getManufacturersByModel($models[$i]->model_id);
        }
        
        $this->set('models', $models);

        if (isset($_POST['deleteModel'])) {
            $this->deleteModel();
        }        
    }
    public function colors(){
        $this->set('colors', ColorModel::getAll());  
        
        if (isset($_POST['deleteColor'])) {
            $this->deleteColor();
        }        
    }
    public function transmission(){
        $this->set('transmission', TransmissionModel::getAll());  
        
        if (isset($_POST['deleteTransmission'])) {
            $this->deleteTransmission();
        }        
    }
    public function equipment(){
        $this->set('equipment', EquipmentModel::getAll()); 
        
        if (isset($_POST['deleteEquipment'])) {
            $this->deleteEquipment();
        }        
    }
    public function registered(){
        $this->set('registered', RegisteredModel::getAll());  
        
        if (isset($_POST['deleteRegistered'])) {
            $this->deleteRegistered();
        }        
    }


    public function addManufacturer(){
        if (isset($_POST['addManufacturer'])) {
            
            $manufacturer = filter_input(INPUT_POST, 'manufacturer');
            
            if ($manufacturer == ''){
                $this->set('message', 'Invalid values sent!');
            } else {
                $res = ManufacturerModel::add($manufacturer);
            }
            
            if ($res){
                Misc::redirect('superAdmin/manufacturers/');
            } else {
                $this->set('message', 'Could not add a new manufacturer!');
            }
            
        }
    }
    
    public function addModel(){
        
        $this->set('manufacturers', ManufacturerModel::getAll());
        
        if (isset($_POST['addModel'])) {
            
            $manufacturer_id = filter_input(INPUT_POST, 'manufacturer_id', FILTER_SANITIZE_NUMBER_INT);
            $model = filter_input(INPUT_POST, 'model');
            
            if ($manufacturer_id == '' or $model == ''){
                $this->set('message', 'Invalid values sent!');
            } else {
                $res1 = ModelModel::add($model, $manufacturer_id);
            }
            
            if ($res1){
                Misc::redirect('superAdmin/models/');
            } else {
                $this->set('message', 'Could not add a new model!');
            }
            
        }
        
    }
    
    public function addColor(){
        if (isset($_POST['addColor'])) {
            
            $color = filter_input(INPUT_POST, 'color');
            
            if ($color == ''){
                $this->set('message', 'Invalid values sent!');
            } else {
                $res = ColorModel::add($color);
            }
            
            if ($res){
                Misc::redirect('superAdmin/colors/');
            } else {
                $this->set('message', 'Could not add a new color!');
            }
            
        }
    }  
    
    public function addTransmission(){
        if (isset($_POST['addTransmission'])) {
            
            $transmission = filter_input(INPUT_POST, 'transmission');
            
            if ($transmission == ''){
                $this->set('message', 'Invalid values sent!');
            } else {
                $res = TransmissionModel::add($transmission);
            }
            
            if ($res){
                Misc::redirect('superAdmin/transmission/');
            } else {
                $this->set('message', 'Could not add a new type of gearbox!');
            }
            
        }
    }    
    public function addEquipment(){
        if (isset($_POST['addEquipment'])) {
            
            $equipment = filter_input(INPUT_POST, 'equipment');
            
            if ($equipment == ''){
                $this->set('message', 'Invalid values sent!');
            } else {
                $res = EquipmentModel::add($equipment);
            }
            
            if ($res){
                Misc::redirect('superAdmin/equipment/');
            } else {
                $this->set('message', 'Could not add a new equipment!');
            }
            
        }
    }    
    public function addRegistered(){
        if (isset($_POST['addRegistered'])) {
            
            $registered = filter_input(INPUT_POST, 'registered');
            
            if ($registered == ''){
                $this->set('message', 'Invalid values sent!');
            } else {
                $res = RegisteredModel::add($registered);
            }
            
            if ($res){
                Misc::redirect('superAdmin/registered/');
            } else {
                $this->set('message', 'Could not add a new registration date!');
            }
            
        }
    }

    
    public function deleteColor(){
        
        $colorID = filter_input(INPUT_POST, 'colorID', FILTER_SANITIZE_NUMBER_INT);
        $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);

        if ($confirmed == 1) {
            $res = ColorModel::delete($colorID);

            if ($res) {
                Misc::redirect('superAdmin/colors/');
            }
        }
    }
    public function deleteEquipment(){
        
        $equipmentID = filter_input(INPUT_POST, 'equipmentID', FILTER_SANITIZE_NUMBER_INT);
        $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);

        if ($confirmed == 1) {
            $res = EquipmentModel::delete($equipmentID);

            if ($res) {
                Misc::redirect('superAdmin/equipment/');
            }
        }
    }
    public function deleteManufacturer(){
        
        $manufacturerID = filter_input(INPUT_POST, 'manufacturerID', FILTER_SANITIZE_NUMBER_INT);
        $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);

        if ($confirmed == 1) {
            $res = ManufacturerModel::delete($manufacturerID);

            if ($res) {
                Misc::redirect('superAdmin/manufacturers/');
            }
        }
    }
    public function deleteModel(){
        
        $modelID = filter_input(INPUT_POST, 'modelID', FILTER_SANITIZE_NUMBER_INT);
        $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);

        if ($confirmed == 1) {
            $res = ModelModel::delete($modelID);

            if ($res) {
                Misc::redirect('superAdmin/models/');
            }
        }
    }
    
    public function deleteRegistered(){
        
        $registeredID = filter_input(INPUT_POST, 'registeredID', FILTER_SANITIZE_NUMBER_INT);
        $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);

        if ($confirmed == 1) {
            $res = RegisteredModel::delete($registeredID);

            if ($res) {
                Misc::redirect('superAdmin/registered/');
            }
        }
    }
    public function deleteTransmission(){
        
        $transmissionID = filter_input(INPUT_POST, 'transmissionID', FILTER_SANITIZE_NUMBER_INT);
        $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);

        if ($confirmed == 1) {
            $res = TransmissionModel::delete($transmissionID);

            if ($res) {
                Misc::redirect('superAdmin/transmission/');
            }
        }
    }
    
}

