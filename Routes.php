<?php
    
    return [
        [
            'Pattern'    => '|^login/?$|',
            'Controller' => 'Main',
            'Method'     => 'login'
        ],
        [
            'Pattern'    => '|^logout/?$|',
            'Controller' => 'Main',
            'Method'     => 'logout'
        ],
        [
            'Pattern'    => '|^register/?$|',
            'Controller' => 'Main',
            'Method'     => 'register'
        ],
        [
            'Pattern'    => '|^page/?$|',
            'Controller' => 'Page',
            'Method'     => 'show'
        ],
        [
            'Pattern'    => '|^car/([0-9]+)/?$|',
            'Controller' => 'Car',
            'Method'     => 'view'
        ],
        [
            'Pattern'    => '|^cars/?$|',
            'Controller' => 'AdminCars',
            'Method'     => 'index'
        ],     
        [
            'Pattern'    => '|^cars/add/?$|',
            'Controller' => 'AdminCars',
            'Method'     => 'add'
        ],        
        [
            'Pattern'    => '|^cars/edit/([0-9]+)/?$|',
            'Controller' => 'AdminCars',
            'Method'     => 'edit'
        ],        
        [
            'Pattern'    => '|^api/manufacturers/?$|',
            'Controller' => 'ApiCars',
            'Method'     => 'manufacturers'
        ],                   
        ////////        
        [
            'Pattern'    => '|^api/car/modelsByManufacturer/manufacturer/([0-9]+)/?$|',
            'Controller' => 'ApiCars',
            'Method'     => 'modelsByManufacturer'
        ], 
        ////////SuperAdmin Rutes///////////
        [
            'Pattern'    => '|^superAdmin/login/?$|',
            'Controller' => 'SuperAdminMain',
            'Method'     => 'login'
        ],
        [
            'Pattern'    => '|^superAdmin/logout/?$|',
            'Controller' => 'SuperAdminMain',
            'Method'     => 'logout'
        ],
        [
            'Pattern'    => '|^superAdmin/menu/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'index'
        ],
        [
            'Pattern'    => '|^superAdmin/userAccounts/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'userAccounts'
        ],
        [
            'Pattern'    => '|^superAdmin/editUserAccount/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'editUserAccount'
        ],
        [
            'Pattern'    => '|^superAdmin/manufacturers/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'manufacturers'
        ],
        [
            'Pattern'    => '|^superAdmin/addManufacturer/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'addManufacturer'
        ],
        [
            'Pattern'    => '|^superAdmin/models/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'models'
        ],
        [
            'Pattern'    => '|^superAdmin/addModel/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'addModel'
        ],
        [
            'Pattern'    => '|^superAdmin/colors/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'colors'
        ],        
        [
            'Pattern'    => '|^superAdmin/addColor/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'addColor'
        ],
        [
            'Pattern'    => '|^superAdmin/transmission/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'transmission'
        ],
        [
            'Pattern'    => '|^superAdmin/addTransmission/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'addTransmission'
        ],
        [
            'Pattern'    => '|^superAdmin/equipment/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'equipment'
        ],
        [
            'Pattern'    => '|^superAdmin/addEquipment/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'addEquipment'
        ],
        [
            'Pattern'    => '|^superAdmin/registered/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'registered'
        ],
        [
            'Pattern'    => '|^superAdmin/addRegistered/?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'addRegistered'
        ],
        [
            'Pattern'    => '|^superAdmin/menu/.*?$|',
            'Controller' => 'SuperAdminMenu',
            'Method'     => 'index'
        ],       
        [
            'Pattern'    => '|^imageAndEquipment/add/?$|',
            'Controller' => 'AdminCarImage',
            'Method'     => 'addImageAndEquipment'
        ],        
        [
            'Pattern'    => '|^imageAndEquipment/edit/([0-9]+)/?$|',
            'Controller' => 'AdminCarImage',
            'Method'     => 'editImageAndEquipment'
        ],              
        [
            'Pattern'    => '|^.*$|',
            'Controller' => 'Car',
            'Method'     => 'index'
        ]
    ];
