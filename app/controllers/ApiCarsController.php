<?php

class ApiCarsController extends ApiController{
    public function manufacturers() {
        $manufacturers = ManufacturerModel::getAll();
        if ($manufacturers) {
            $this->set('manufacturers', $manufacturers);
            $this->set('status', 'success');
        } else {
            $this->set('status', 'error');
            $this->set('message', 'Could not find any manufacturer.');            
        }
    }
   
    public function modelsByManufacturer($id){
        $manufacturer_id = intval($id);
        $models = ModelModel::getModelsByManufacturer($manufacturer_id);
        if ($models) {
            $this->set('models', $models);
            $this->set('status', 'success');
        } else {
            $this->set('status', 'error');
            $this->set('message', 'Could not find any model for this manufacturer.');            
        }
    }    
    
}
