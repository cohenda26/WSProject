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
    }
?>
