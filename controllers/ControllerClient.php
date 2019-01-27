<?php

    class ControllerAccueil Extends Controller{
        private $_clientManager;
        private $_view;

        private function clients($params){
            $this->_clientManager = new ClientManager(null);
            $clients = $this->_clientManager->getClients();

            //require_once('views/viewAccueil.php');

            $this->_view = new View("Client");
            $this->_view->generate(array("clients"=> $clients));
        }
    }
?>