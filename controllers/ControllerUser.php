<?php

    class ControllerUser Extends Controller{
        private $_userManager;
        private $_view;

        public function login($params){
            $this->_userManager = new UserManager(null);
            $user = $this->_userManager->getUser($params);
            if (isset($user)){
                if ($user->password() == $params['password']){
                    $this->_userManager->activeSession($user);

                    $this->_view = new View("Home");
                    $this->_view->generate(array("user"=> $user));
                }
                else {
                    throw new Exception (' Utilisateur inexistant');
                }
            }
            else {
                throw new Exception (' Utilisateur non trouvé');
            }
        }

        public function logout($params){
            $this->_userManager = new UserManager(null);
            if (isset($_SESSION['username'])){
                $this->_userManager->destroySession();
            }
            $this->_view = new View("Home");
            $this->_view->generate(array());
        }

        public function register($params){
            $this->_userManager = new UserManager(null);
            // verification que l'utilisateur n'existe pas dans la base
            $user = $this->_userManager->getUser($params);
            if (!isset($user) ){
                // Enregistrement du nouveau User
                $user = $this->_userManager->registerUser($params);
                $this->login($params);                
            } else {
                throw new Exception (' Utilisateur déjà existant');
            }
        }

        public function registerPartenaire($params){
            $this->_userManager = new UserManager(null);
            // verification que l'utilisateur n'existe pas dans la base
            $user = $this->_userManager->getUser($params);
            if (!isset($user) ){
                // Enregistrement du nouveau User
                $user = $this->_userManager->registerPartenaire($params);
                $this->login($params);                
            } else {
                throw new Exception (' Utilisateur déjà existant');
            }
        }
    }
?>
