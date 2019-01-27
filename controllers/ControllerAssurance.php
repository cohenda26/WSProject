<?php

    class ControllerAssurance Extends Controller{
        private $_assuranceManager;
        private $_view;

        private function habitation($params){
            $this->_assuranceManager = new AssuranceManager(null);
            $assurances = $this->_assuranceManager->getList();

            $this->_view = new View("Assurance");
            $this->_view->generate(array("assurances"=> $assurances));
        }
    }
?>