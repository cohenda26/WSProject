<?php

Class Controller {

    public function __construct($CtrlName, $method = null, $params = null)
    {
        If (isset($method)){
            if (method_exists($this, $method)){
                $this->$method($params);
            }
            else {
                throw new Exception('Contructeur ' . $CtrlName . ' method : '. $method . ' non existante');
            }  
        }     
    }
}
?>