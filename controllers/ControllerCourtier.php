<?php

    class ControllerCourtier Extends Controller{
        private $_courtierManager;
        private $_devisManager;
        private $_view;

        public function espaceProfessionnel($params){
            $this->_courtierManager = CourtierManager::getNewInstance();
            $currentUser = UserManager::getSessionUser();
            $courtier = $this->_courtierManager->getCourtier($currentUser);

            $this->_devisManager = DevisManager::getNewInstance();
            $devis = $this->_devisManager->getDevisEnAttente();

            $this->_view = new View("Courtier/EspaceProfessionnel");
            $this->_view->generate(array("courtier" => $courtier,
                                         "devis" => $devis));
        }

        public function listClients($params){
            $this->_courtierManager = CourtierManager::getNewInstance();
            $clients = $this->_courtierManager->getClients();

            $this->_view = new View("Courtier/ListeClients");
            $this->_view->generate(array("clients"=> $clients));
        }
    }
?>