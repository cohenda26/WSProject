<?php

    class ControllerAccueil{
        private $_clientManager;
        private $_view;

        public function __construct($url){
            if (isset($url) && count($url) > 1) {
                throw new Exception('Page Client introuvable');
            }
            else {
                $this->clients();
            }
        }

        private function clients(){
            $this->_clientManager = new ClientManager(null);
            $clients = $this->_clientManager->getClients();

            //require_once('views/viewAccueil.php');

            $this->_view = new View("Client");
            $this->_view->generate(array("clients"=> $clients));
        }
    }
?>