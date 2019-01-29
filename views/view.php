<?php

class View{
    private $_file;
    private $_titre;

    public function __construct($action){
       $this->_file = VIEWS."view". $action . ".php";
    }

    public function generate($data){
        // GENERATION DU CONTENU DE LA VUE 
        // LE TITRE DOIT ETRE MISE A JOUR A L'INTERIEUR DE LA VIEW 
        $content = $this->generateFile($this->_file, $data);

        // GENERATION DU CONTENU DU TEMPLATE
        $view = $this->generateFile(VIEWS."template.php", array('titre'=>$this->_titre, 
                                                                'content'=>$content));
        echo $view;
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