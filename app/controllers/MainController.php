<?php
    class MainController extends Controller {

        public function login() {
            if (isset($_POST['loginBtn'])) {
                $username = filter_input(INPUT_POST, 'inputEmail', FILTER_SANITIZE_EMAIL);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                
                if (!preg_match('/^.{6,64}$/', $username) or !preg_match('/^.{6,255}$/', $password)) {
                    $this->set('message', 'Parametri za prijavu nisu ispravni!');
                    return;
                }

                $hash = hash('sha512', $password . Configuration::USER_SALT);
                $password = '000000000000000000000000000000000000000000000000000';

                $user = UserModel::getByUsernameAndPasswordHash($username, $hash);
                $hash = '0000000000000000000000000000000000000000000000000000000';

                if ($user) {
                    Session::set('user_id', $user->user_id);
                    Session::set('username', $username);
                    Session::set('ip', filter_input(INPUT_SERVER, 'REMOTE_ADDR'));
                    Session::set('ua', filter_input(INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_STRING));

                    Misc::redirect('');
                } else {
                    $this->set('message', 'Nisu dobri login parametri.');
                    sleep(1);
                }
            }
        }

        public function logout() {
            Session::end();
            Misc::redirect('login');
        }
        
        public function register(){
            if (isset($_POST['regBtn'])) {
                $email = filter_input(INPUT_POST, 'regEmail', FILTER_SANITIZE_EMAIL);
                $password = filter_input(INPUT_POST, 'regPassword', FILTER_SANITIZE_STRING);
                $password2 = filter_input(INPUT_POST, 'regPassword2', FILTER_SANITIZE_STRING);
                $forename = filter_input(INPUT_POST, 'regForename', FILTER_SANITIZE_STRING);
                $surname = filter_input(INPUT_POST, 'regSurname', FILTER_SANITIZE_STRING);
                $address = filter_input(INPUT_POST, 'regAddress', FILTER_SANITIZE_STRING);
                $phone = filter_input(INPUT_POST, 'regPhone', FILTER_SANITIZE_STRING);
                
                if (!preg_match('/^.{6,64}$/', $email) or !preg_match('/^.{6,255}$/', $password) or
                        !preg_match('/^.{6,255}$/', $password2) or !preg_match('/^([A-z][\ |\-]?){2,}$/', $forename) or
                        !preg_match('/^([A-z][\ |\-]?){2,}$/', $surname) or !preg_match('/^.{2,}$/', $address) or
                        !preg_match('/^[\+]?([0-9][\ ]?){7,}$/', $phone)) {
                    $this->set('message', 'Podaci nisu uneti u ispravnom formatu!');
                    return;
                }                
                             
                if ($email == '' or $password == '' or $password2 == '' or $forename == '' or $surname == '' or $address == '' or $phone == ''){
                    $this->set('message', 'Invalid values sent!');
                } else {                 
                    if ($password == $password2) {
                        $hash = hash('sha512', $password . Configuration::USER_SALT);
                        $password = '000000000000000000000000000000000000000000000000000';
                        
                        $rezultat = UserModel::add($email, $hash, $forename, $surname, $address, $phone);
                        $hash = '0000000000000000000000000000000000000000000000000000000';
                        if($rezultat){
                            Misc::redirect('page/');
                        } else {
                            $this->set('message', 'Greška!');
                        }                     
                    } else {
                        $this->set('message', 'Lozinke se ne poklapaju!');
                        sleep(1);
                    }     
                }
            }
        }
        
    }
