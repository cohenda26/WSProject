<?php

    class ControllerClient Extends Controller{
        private $_clientManager;
        private $_devisManager;
        private $_view;

        public function espacePersonnel($params){
            $this->_clientManager = ClientManager::getNewInstance();
            $currentUser = UserManager::getSessionUser();
            $client = $this->_clientManager->getClient($currentUser);

            $devis = $this->_clientManager->getAllDevis($client);
            $contrats = $this->_clientManager->getAllContrats($client);
            $sinistres = $this->_clientManager->getAllSinistres($client);

            $this->_view = new View("Client/EspacePersonnel");
            $this->_view->generate(array("client" => $client,
                                         "devis" => $devis,
                                         "contrats" => $contrats,
                                         "sinistres" => $sinistres));
        }

        public function listContrats($params){
            $this->_clientManager = ClientManager::getNewInstance();
            $currentUser = UserManager::getSessionUser();
            $client = $this->_clientManager->getClient($currentUser);
            $contrats = $this->_clientManager->getAllContrats($client);

            $this->_view = new View("Client/ListeContrats");
            $this->_view->generate(array("user" => $currentUser,
                                         "client" => $client, 
                                         "contrats"=> $contrats));
        }

        public function listDevis($params){
            $currentUser = UserManager::getSessionUser();
            $this->_clientManager = ClientManager::getNewInstance();
            $client = $this->_clientManager->getClient($currentUser);
            $devis = $this->_clientManager->getAllDevis($client);

            $this->_view = new View("Client/ListeDevis");
            $this->_view->generate(array("user" => $currentUser,
                                        "client" => $client, 
                                        "devis"=> $devis));

        }

        // GESTION DES CONTRATS DE TYPE HABITATION
        public function getDevisHabitation($params){
            $currentUser = UserManager::getSessionUser();

            $this->_clientManager = ClientManager::getNewInstance();
            $client = $this->_clientManager->getClient($currentUser);

            $this->_devisManager = DevisManager::getNewInstance();
            $devis = $this->_devisManager->getDevis($params["id"]);

            $this->_view = new View("Client/DevisHabitation");
            $this->_view->generate(array("user" => $currentUser,
                                         "client" => $client, 
                                         "devis"=> $devis));
        }

        public function deleteDevisHabitation($params){
            $currentUser = UserManager::getSessionUser();

            $this->_clientManager = ClientManager::getNewInstance();
            $client = $this->_clientManager->getClient($currentUser);

            $this->_devisManager = DevisManager::getNewInstance();
            $devis = $this->_devisManager->deleteDevis($params["id"]);

            // $this->_view = new View("Client/DevisHabitation");
            // $this->_view->generate(array("user" => $currentUser,
            //                              "client" => $client, 
            //                              "devis"=> $devis));
        }

        public function demanderDevisHabitation($params){
            $currentUser = UserManager::getSessionUser();

            $this->_clientManager = ClientManager::getNewInstance();
            $client = $this->_clientManager->getClient($currentUser);

            $this->_devisManager = DevisManager::getNewInstance();
            $devis = $this->_devisManager->getNewDevis(null);

            $this->_view = new View("Client/DevisHabitation");
            $this->_view->generate(array("user"  => $currentUser,
                                         "client"=> $client,
                                         "devis" => $devis));
        }        

        public function validerDevisHabitation($params){
            $currentUser = UserManager::getSessionUser();

            $this->_clientManager = ClientManager::getNewInstance();
            $client = $this->_clientManager->getClient($currentUser);

            $this->_devisManager = DevisManager::getNewInstance();
            $this->_devisManager->addDevis($params, $client);

            $homeManager = HomeManager::getNewInstance();
           // a remettre $homeManager->sendMail();


            //$this->listDevis($params);
            $this->espacePersonnel($params);

            // $devis = $this->_devisManager->getAllDevis($client);
            // $this->_view = new View("ClientAllDevis");
            // $this->_view->generate(array("devis"=> $devis));
        }   


    }
?>