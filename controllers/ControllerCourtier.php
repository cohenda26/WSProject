<?php

    class ControllerCourtier Extends Controller{
        private $_courtierManager;
        private $_view;

        private function listClients($params){
            $this->_courtierManager = CourtierManager::getNewInstance();
            $clients = $this->_courtierManager->getClients();

            $this->_view = new View("CourtierClients");
            $this->_view->generate(array("clients"=> $clients));
        }
    }
?>