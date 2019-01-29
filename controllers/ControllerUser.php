<?php

    class ControllerUser Extends Controller{
        private $_userManager;
        private $_view;

        public function login($params){
            $this->_userManager = new UserManager(null);
            $user = $this->_userManager->getUser($params);
            if (isset($user)){
                $this->_userManager->activeSession($user);
                header('Location: ../index.php');
                // $this->_view = new View("Home");
                // $this->_view->generate(array("user"=> $user));
            }
                $this->_view = new View("Home");
                $this->_view->generate(array("user"=> $user));
        }

        public function logout($params){
            $this->_userManager = new UserManager(null);
            if (isset($_SESSION['username'])){
                $this->_userManager->destroySession();
                header('Location: ../index.php');

            // $this->_view = new View("Home");
            // $this->_view->generate(array());
            }
        }

        public function register($params){

        }

        public function partenaire($params){

        }
    }
?>
