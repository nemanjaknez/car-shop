<?php

    class SuperAdminMainController extends Controller {

        public function login() {
            if (isset($_POST['loginButton'])) {
                $username = filter_input(INPUT_POST, 'em', FILTER_SANITIZE_EMAIL);
                $password = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);

                if (!preg_match('/^.{6,64}$/', $username) or !preg_match('/^.{6,255}$/', $password)) {
                    $this->set('message', 'Parametri za prijavu nisu ispravni!');
                    return;
                }            

                $hash = hash('sha512', $password . Configuration::USER_SALT);
                $password = '000000000000000000000000000000000000000000000000000';

                $superAdmin = SuperAdminModel::getByUsernameAndPasswordHash($username, $hash);
                $hash = '0000000000000000000000000000000000000000000000000000000';

                if ($superAdmin) {
                    Session::set('super_admin_id', $superAdmin->super_admin_id);
                    Session::set('username', $username);

                    Misc::redirect('superAdmin/menu/');
                } else {
                    $this->set('message', 'Nisu dobri login parametri.');
                    sleep(1);
                }
            }
        }

        public function logout() {
            Session::end();
            Misc::redirect('superAdmin/login/');
        }
    }
