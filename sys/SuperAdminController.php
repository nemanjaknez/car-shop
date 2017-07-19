<?php

class SuperAdminController extends Controller{

    public final function __pre() {
        if (!Session::exists('super_admin_id')) {
            Misc::redirect('superAdmin/login/');
        }
    }
    
}
