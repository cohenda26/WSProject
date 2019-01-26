<?php

    class ControllerUser{
        private $_userManager;
        private $_view;

        public function __construct($url){
            if (isset($url) && count($url) > 2) {
                throw new Exception('Page login introuvable');
            }
            else {
                // VALIDATION DES MODALS, ON PASSE EN DEUXIEME PARAMETRES L'ACTION (Login, Register, Partenaire, ....)
                $action = $url[1];
                switch ($action) {
                    case 'login':
                        $this->login();
                        break;
                    case 'register':
                        $this->register();
                    break;
                    case 'partenaire':
                        $this->partenaire();
                    break;
                    default:
                        # code...
                     break;
                }
               
            }
        }

        private function login(){
            // INSTANCIATION DU UserManager pour valider que le User est OK
            $this->_userManager = new UserManager(null);
            $user = $this->_userManager->getUser($_POST);
            if (isset($user)){
                $_SESSION['username'] = $user->username();
            }

            // ON REDIRIGE SUR LA PAGE PRINCIPALE AVEC LA View de L'Accueil
            $this->_view = new View("Accueil");
            $this->_view->generate(array("user"=> $user));
        }

        private function register(){

        }

        private function partenaire(){

        }
    }
?>
