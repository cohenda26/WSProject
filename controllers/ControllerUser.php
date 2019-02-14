<?php

    class ControllerUser Extends Controller{
        private $_userManager;
        private $_courtierManager;
        private $_clientManager;
        private $_view;
        private $_ajax;


        public function userConnected(){
            $this->_ajax = new Ajax("User");
            $this->_ajax->generate(array("currentUser" => UserManager::getSessionUser(), 
                                         "currentCourtier" => UserManager::getSessionCourtier(),
                                         "currentClient" => UserManager::getSessionClient() ));
        }

        public function login($params){
            $this->_userManager = UserManager::getNewInstance();
            $user = $this->_userManager->getUser($params);
            if (isset($user)){
                if ($user->password() == $params['password']){
                    $courtier = null;
                    $client = null;
                    if ($user->isCourtier() == true){
                        $this->_courtierManager = CourtierManager::getNewInstance();
                        $courtier = $this->_courtierManager->getCourtier($user);
                    }
                    if ($user->isClient() == true){
                        $this->_clientManager = ClientManager::getNewInstance();
                        $client = $this->_clientManager->getClient($user);
                    }
                    UserManager::activeSession($user, $courtier, $client);

                    $this->_ajax = new Ajax("User");
                    $this->_ajax->generate(array("currentUser" => $user, 
                                                 "currentCourtier" => $courtier,
                                                 "currentClient" => $client ));
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
            UserManager::destroySession();

            $this->_userManager = null;
            $this->_courtierManager = null;
            $this->_clientManager = null ;

            $this->_ajax = new Ajax("User");
            $this->_ajax->generate(array("currentUser" => $this->_userManager, 
                                         "currentCourtier" => $this->_courtierManager,
                                         "currentClient" => $this->_clientManager ));
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

        public function registerCourtier($params){
            $this->_userManager = UserManager::getNewInstance();
            // verification que l'utilisateur n'existe pas dans la base
            $user = $this->_userManager->getUser($params);
            if (!isset($user) ){
                // Enregistrement du nouveau User
                $user = $this->_userManager->registerCourtier($params);
                $this->login($params);                
            } else {
                throw new Exception (' Utilisateur déjà existant');
            }
        }
    }
?>
