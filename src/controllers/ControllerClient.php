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

            $this->_view = new View("client/espacePersonnel");
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

            $this->_view = new View("client/listeContrats");
            $this->_view->generate(array("user" => $currentUser,
                                         "client" => $client, 
                                         "contrats"=> $contrats));
        }

        public function listDevis($params){
            $currentUser = UserManager::getSessionUser();
            $this->_clientManager = ClientManager::getNewInstance();
            $client = $this->_clientManager->getClient($currentUser);
            $devis = $this->_clientManager->getAllDevis($client);

            $this->_view = new View("client/listeDevis");
            $this->_view->generate(array("user" => $currentUser,
                                        "client" => $client, 
                                        "devis"=> $devis));

        } 


    }
?>