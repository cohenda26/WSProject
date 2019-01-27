<?php

    class ControllerClient Extends Controller{
        private $_clientManager;
        private $_view;

        private function listContrats($params){
            $this->_clientManager = new ClientManager(null);
            $contrats = $this->_clientManager->getAllContrats($params);

            $this->_view = new View("ClientAllContrats");
            $this->_view->generate(array("contrats"=> $contrats));
        }

        private function listContratsHabitations($params){
            $this->_clientManager = new ClientManager(null);
            $contrats = $this->_clientManager->getContratsHabitations();

            $this->_view = new View("ClientContratHabitation");
            $this->_view->generate(array("contrats"=> $contrats));
        }

        private function listContratsVie($params){
            $this->_clientManager = new ClientManager(null);
            $contrats = $this->_clientManager->getContratsVie();

            $this->_view = new View("ClientContratVie");
            $this->_view->generate(array("contrats"=> $contrats));
        }

        private function listContratsVoitures($params){
            $this->_clientManager = new ClientManager(null);
            $contrats = $this->_clientManager->getContratsVoitures();

            $this->_view = new View("ClientContratVoiture");
            $this->_view->generate(array("contrats"=> $contrats));
        }
    }
?>