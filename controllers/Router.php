<?php
    require_once(MODELS .'DBObject.php');
    require_once(MODELS .'User.php');

    session_start();

    require_once(VIEWS.'view.php');

class Router{
    private $_Ctrl;
    private $_view;

    private $_nameCtrl = 'Home';
    private $_nameMethod = 'Home';
    private $_params = null;

    // Format des url : nameControlleur/Method/Params (Params par paire ex:Id/1)
    // Son rajouté dans la params les données envoyées en POST
    public function getParams(){   
        // echo 'VAR GET    <pre>' . print_r($_GET) . '</pre>';
        // echo 'VAR POST   <pre>' . print_r($_POST) . '</pre>';

        if (isset($_GET['url'])){
            $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

            $this->_nameCtrl = ucfirst(strtolower($url[0]));  
            unset($url[0]);
            
            if (count($url) >= 1){
                $this->_nameMethod = strtolower($url[1]);  
                unset($url[1]);

                for ($i=2; $i<count($url); $i++){
                    $this->_params[$url[$i]] = $url[$i+1];
                    $i++;
                }
            }
        }

        if ($_POST){
            foreach($_POST as $key => $val){
                $this->_params[$key] = $val;
            }
        }
      
    }

    public function routeReq(){

        try {
            // Chargement automatique des Classes
            spl_autoload_register(function($class){
                if (file_exists(MODELS.$class.'.php')){
                    require_once(MODELS.$class.'.php');
                } else if (file_exists(CONTROLLERS.$class.'.php')){
                           require_once(CONTROLLERS.$class.'.php');
                        }
            });

            $this->getParams();

            // nom de la class controller : (ex : ControllerHome, pour le controller de l'action Home)
            $controllerClass = "Controller".$this->_nameCtrl;

            // nom du fichier = dossierController + le fichier ControllerClass.php
            $controllerFile = CONTROLLERS.$controllerClass.".php";

            if (file_exists($controllerFile)){
                $this->_Ctrl = new $controllerClass($this->_nameCtrl, $this->_nameMethod, $this->_params);
            }
            else {
                throw new Exception ('Page introuvable : '.$controllerFile);
            }

        } catch (Exception $e) {
            $errorMsg = $e->getMessage();
            
            $this->_view = new View("Errors");
            $this->_view->generate(array("errorMsg"=> $errorMsg));
        }
    }
}
?>