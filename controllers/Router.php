<?php
require_once('views/view.php');

class Router{
    private $_Ctrl;
    private $_view;

    public function routeReq(){

        try {
            // CHARGEMENT AUTO DES CLASSES
            spl_autoload_register(function($class){
                //echo 'AUTOLOAD CLASS : '. 'models/'.$class.'.php' . '<br>';
                require_once('models/'.$class.'.php');
            });

            $url = [];

            // LE CONTROLLER EST INCLUS SELON L'ACTION DE L'UTILISATEUR
            if (isset($_GET['url'])){
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                $controller = ucfirst(strtolower($url[0]));
                // nom de la class controller : (ex : ControllerAccueil, pour le controller de l'action Accueil)
                $controllerClass = "Controller".$controller;
                // nom du fichier = dossierController + le fichier ControllerClass.php
                $controllerFile = "controllers/".$controllerClass.".php";

                if (file_exists($controllerFile)){
                    require_once($controllerFile);
                    $this->_Ctrl = new $controllerClass($url);
                }
                else {
                    throw new Exception ('Page introuvable : '.$controllerFile);
                }
            }
            else {
                require_once('controllers/ControllerAccueil.php');
                $this->_Ctrl = new ControllerAccueil($url);
            }

            //code...
        } catch (Exception $e) {
            $errorMsg = $e->getMessage();
            //require_once('views/viewErrors.php');
            
            $this->_view = new View("Errors");
            $this->_view->generate(array("errorMsg"=> $errorMsg));
        }
    }
}
?>