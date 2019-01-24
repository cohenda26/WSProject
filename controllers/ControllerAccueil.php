<?php

    class ControllerAccueil{
        private $_accueilManager;
        private $_view;

        public function __construct($url){
            if (isset($url) && count($url) > 1) {
                throw new Exception('Page Accueil introuvable');
            }
            else {
                $this->accueil();
            }
        }

        private function accueil(){
            $this->_accueilManager = new AccueilManager(null);
            $accueil = $this->_accueilManager->getAccueil();

            //require_once('views/viewAccueil.php');

            $this->_view = new View("Accueil");
            $this->_view->generate(array("accueil"=> $accueil));
        }
    }
?>
