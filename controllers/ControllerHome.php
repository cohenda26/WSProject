<?php

    class ControllerHome extends Controller{
        private $_homeManager;
        private $_view;

        public function home($params){
            $this->_homeManager = HomeManager::getNewInstance();
            $home = $this->_homeManager->getHome();

            $this->_view = new View("Home");
            $this->_view->generate(array("Home"=> $home));
        }

        public function AssuranceHabitation($params){
            $this->_homeManager = HomeManager::getNewInstance();
            $assHabitation = $this->_homeManager->getAssHabitation();

            $this->_view = new View("Home/AssHabitation");
            $this->_view->generate(array("assHabitation"=> $assHabitation));            
        }

        public function AssuranceHypotheque($params){
            $this->_homeManager = HomeManager::getNewInstance();
            $assHypotheque = $this->_homeManager->getAssHypotheque();

            $this->_view = new View("Home/AssHypotheque");
            $this->_view->generate(array("assHypotheque"=> $assHypotheque));            
        }

        public function AssuranceVoiture($params){
            $this->_homeManager = HomeManager::getNewInstance();
            $assVoiture = $this->_homeManager->getAssVoiture();

            $this->_view = new View("Home/AssVoiture");
            $this->_view->generate(array("assHVoiture"=> $assVoiture));            
        }

        public function AssuranceVie($params){
            $this->_homeManager = HomeManager::getNewInstance();
            $assVie = $this->_homeManager->getAssVie();

            $this->_view = new View("Home/AssVie");
            $this->_view->generate(array("assVie"=> $assVie));            
        }

        public function AssuranceSante($params){
            $this->_homeManager = HomeManager::getNewInstance();
            $assSante = $this->_homeManager->getAssSante();

            $this->_view = new View("Home/AssSante");
            $this->_view->generate(array("assSante"=> $assSante));            
        }

        public function AssuranceVoyage($params){
            $this->_homeManager = HomeManager::getNewInstance();
            $assVoyage = $this->_homeManager->getAssVoyage();

            $this->_view = new View("Home/AssVoyage");
            $this->_view->generate(array("assVoyage"=> $assVoyage));            
        }
    }
?>
