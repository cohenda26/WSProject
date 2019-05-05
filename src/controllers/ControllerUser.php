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
                                         "currentClient" => UserManager::getSessionClient(),
                                         "locationPage" => "" ));
        }

        public function login($params){
            $this->_userManager = UserManager::getNewInstance();
            $user = $this->_userManager->getUser($params);
            if (isset($user)){
                $hash_password = hash('sha256', $params['password']);
                //$decrypt_password = hash('sha256', $user->password());
                // if ($user->password() == $params['password']){
               if ($user->password() == $hash_password){
                    $courtier = null;
                    $client = null;
                    $locationPage = "";
                    if ($user->isCourtier() == true){
                        $this->_courtierManager = CourtierManager::getNewInstance();
                        $courtier = $this->_courtierManager->getCourtier($user);
                        $locationPage = "courtier/espaceProfessionnel";
                    }
                    if ($user->isClient() == true){
                        $this->_clientManager = ClientManager::getNewInstance();
                        $client = $this->_clientManager->getClient($user);
                        $locationPage = "client/espacePersonnel";
                    }
                    UserManager::activeSession($user, $courtier, $client);

                    $this->_ajax = new Ajax("User");
                    $this->_ajax->generate(array("currentUser" => $user, 
                                                 "currentCourtier" => $courtier,
                                                 "currentClient" => $client,
                                                 "locationPage" => $locationPage));
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
                                         "currentClient" => $this->_clientManager,
                                         "locationPage" => "" ));
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
                // Enregistrement du nouveau Courtier
                $user = $this->_userManager->registerCourtier($params);
                $this->login($params);                
            } else {
                throw new Exception (' Utilisateur déjà existant');
            }
        }
    }
?>
