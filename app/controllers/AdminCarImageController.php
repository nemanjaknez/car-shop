<?php

class AdminCarImageController extends AdminController{
   
    public function index(){
        
    }
        
    public function addImageAndEquipment(){
        
        $car_id = CarModel::getLastAddedCar()->car_id;
        $this->set('equipment', EquipmentModel::getAll());
        
        if(!$_FILES or !isset($_FILES['image'])) return;
        
        if($_FILES['image']['error'] != 0) {
            $this->set('message', 'Doslo je do greske prilikom dodavanja fajla!');
            return;
        }
        
        $temporaryPath = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $originalName = $_FILES['image']['name'];
        
        if ($fileSize > 300*1024){
            $this->set('message', 'Fajl koji dodajete je veci od maksimalne dozvoljene velicine od 300KB!');
            return;
        }
        
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($temporaryPath);
                
        $types = array('image/jpeg', 'image/gif', 'image/png');
        if (!in_array($mimeType, $types)){
            $this->set('message', 'Dozvoljeno je dodavanje samo JPG, PNG i GIF formata slika!');
            return;
        }        
        
        $baseName = strtolower($originalName);
        $baseName = preg_replace("/[^a-z0-9_\s-]\.(png|jpg|gif|jpeg)/", "", $baseName);
        $baseName = preg_replace("/[\s_]/", "-", $baseName);
       
        $fileName = date('YmdHisu') . '-' . $baseName;
        
        $newLocation = Configuration::CAR_IMAGE_DATA_PATH . $fileName;
        
        $res = move_uploaded_file($temporaryPath, $newLocation);
        if (!$res) {
            $this->set('message', 'Doslo je do greske prilikom cuvanja fajla!');
            return;
        }
        
        $res1 = ImageModel::add($newLocation, $car_id);
       
        if (isset($_POST['addImageAndEq'])) {
            $equipment_ids = filter_input(INPUT_POST, 'equipment_ids', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY);
            
            foreach ($equipment_ids as $id){
                EquipmentCarModel::add($id, $car_id);
            }
        }      
        
        Misc::redirect('cars/');
    }
    
    public static function editImageAndEquipment($id){
                
        $car = CarModel::getById($id); 
        
        if ($car->user_id != Session::get('user_id')){
            Misc::redirect('cars/');
        }
        
        if (!$car) {
            Misc::redirect('cars/');
        }          
        $this->set('car', $car);
        
        $car->equipment = CarModel::getEquipmentOfCar($id);
        $car->equipment_ids = [];
        foreach ($car->equipment as $e){
            $car->equipment_ids[] = $e->equipment_id;
        }

        $this->set('equipment', EquipmentModel::getAll());
        $this->set('image', ImageModel::getOneByCarId($id));
        
        if (isset($_POST['editImageAndEq'])) {
            
            if($_FILES['image']['tmp_name'] and isset($_FILES['image'])){             
           
                $temporaryPath = $_FILES['image']['tmp_name'];
                $fileSize = $_FILES['image']['size'];
                $originalName = $_FILES['image']['name'];

                if ($fileSize > 300*1024){
                    $this->set('message', 'Fajl koji dodajete je veci od maksimalne dozvoljene velicine od 300KB!');
                    return;
                }

                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mimeType = $finfo->file($temporaryPath);

                $types = array('image/jpeg', 'image/gif', 'image/png');
                if (!in_array($mimeType, $types)){
                    $this->set('message', 'Dozvoljeno je dodavanje samo JPG, PNG i GIF formata slika!');
                    return;
                }

                $baseName = strtolower($originalName);
                $baseName = preg_replace("/[^a-z0-9_\s-]\.(png|jpg|gif|jpeg)/", "", $baseName);
                $baseName = preg_replace("/[\s_]/", "-", $baseName);

                $fileName = date('YmdHisu') . '-' . $baseName;

                $newLocation = Configuration::CAR_IMAGE_DATA_PATH . $fileName;

                $res = move_uploaded_file($temporaryPath, $newLocation);
                if (!$res) {
                    $this->set('message', 'Doslo je do greske prilikom cuvanja fajla!');
                    return;
                }
                
                ImageModel::delete($id);
                ImageModel::add($newLocation, $id);

            }                  
            
            $equipment_ids = filter_input(INPUT_POST, 'equipment_ids', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY);
            
            EquipmentCarModel::delete($id);
            foreach ($equipment_ids as $eq_id){
                EquipmentCarModel::add($eq_id, $id);                
            }           
            
            Misc::redirect('cars/');
        }    
    }   
}
