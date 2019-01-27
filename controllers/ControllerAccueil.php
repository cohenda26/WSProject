<?php

    class ControllerAccueil extends Controller{
        private $_accueilManager;
        private $_view;

        public function accueil($params){
            $this->_accueilManager = new AccueilManager(null);
            $accueil = $this->_accueilManager->getAccueil();

            $this->_view = new View("Accueil");
            $this->_view->generate(array("accueil"=> $accueil));
        }
    }
?>
