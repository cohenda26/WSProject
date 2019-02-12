<?php

    class ControllerClient Extends Controller{
        private $_clientManager;
        private $_view;

        public function listContrats($params){
            $this->_clientManager = ClientManager::getNewInstance();
            $contrats = $this->_clientManager->getAllContrats($params);

            $this->_view = new View("ClientAllContrats");
            $this->_view->generate(array("contrats"=> $contrats));
        }

        public function listContratsHabitations($params){
            $this->_clientManager = ClientManager::getNewInstance();
            $contrats = $this->_clientManager->getContratsHabitations();

            $this->_view = new View("ClientContratHabitation");
            $this->_view->generate(array("contrats"=> $contrats));
        }

        public function listContratsVie($params){
            $this->_clientManager = ClientManager::getNewInstance();
            $contrats = $this->_clientManager->getContratsVie();

            $this->_view = new View("ClientContratVie");
            $this->_view->generate(array("contrats"=> $contrats));
        }

        public function listContratsVoitures($params){
            $this->_clientManager = ClientManager::getNewInstance();
            $contrats = $this->_clientManager->getContratsVoitures();

            $this->_view = new View("ClientContratVoiture");
            $this->_view->generate(array("contrats"=> $contrats));
        }

        public function souscrireContratHabitation($params){
            $this->_clientManager = ClientManager::getNewInstance();
            $currentUser = UserManager::getSessionUser();
            $client = $this->_clientManager->getClient($currentUser);

            $this->_view = new View("ClientContratHabitation");
            $this->_view->generate(array("client"=> $client));
        }        
    }
?>