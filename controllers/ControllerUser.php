<?php

    class ControllerUser Extends Controller{
        private $_userManager;
        private $_courtierManager;
        private $_view;

        public function login($params){
            $this->_userManager = UserManager::getNewInstance();
            $user = $this->_userManager->getUser($params);
            if (isset($user)){
                if ($user->password() == $params['password']){
                    $courtier = null;
                    if ($user->isCourtier() == true){
                        $this->_courtierManager = CourtierManager::getNewInstance();
                        $courtier = $this->_courtierManager->getCourtier($user);
                    }
                    $this->_userManager->activeSession($user, $courtier);

                    $this->_view = new View("Home");
                    $this->_view->generate(array("currentUser" => $user));
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
            $this->_userManager = UserManager::getNewInstance();
            if (isset($_SESSION['currentUser'])){
                $this->_userManager->destroySession();
            }
            $this->_view = new View("Home");
            $this->_view->generate(array());
        }

        public function register($params){
            $this->_userManager = UserManager::getNewInstance();
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
            $this->_userManager = UserManager::getNewInstance();
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
