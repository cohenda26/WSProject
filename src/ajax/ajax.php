<?php

class Ajax{
    private $_file;
    private $_viewDatas;

    public function __construct($action){
       $this->_file = AJAX."ajax". $action . ".php";
    }

    public function generate($data){
        // GENERATION DU RETOUR SERVER AJAX
        $this->_viewDatas = $data;
        $content = $this->generateFile($this->_file, $this->_viewDatas);

        echo $content;
    }

    public function generateFile($file, $data){
        if (file_exists($file)){

            extract($data);
            
            ob_start();
            
            require $file;
            
            return ob_get_clean();
        }
        else {
            throw new Exception ('Fichier '.$file.' introuvable');
        }
    }
}
?>