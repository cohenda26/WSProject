<?php

class View{
    private $_file;
    private $_viewTitle;
    private $_viewDatas;
    private $_fileStepper;
    private $_fileJs;
    private $_fileCss;

    public function __construct($action){
       $this->_file = VIEWS. $action . ".php";
       $this->_fileStepper = VIEWS. $action . "Stepper.php";
       $this->_fileJs = VIEWS. $action . ".js";
       $this->_fileCss = VIEWS. $action . ".css";
       
    //    try {
    //         list($Ctrler, $fonction) = explode("/", $action);
    //         if ((!is_null($Ctrler)) && (!is_null($fonction)) ){
    //             $this->_fileJs = VIEWS. $Ctrler . "/js/" . $fonction . ".js";
    //         }
    //    }
    //    catch (Exception $e){
    //         $this->_fileJs = "";
    //    }
    }

    public function generate($data){
        // GENERATION DU CONTENU DE LA VUE 
        // LE TITRE DOIT ETRE MISE A JOUR A L'INTERIEUR DE LA VIEW 
        $this->_viewDatas = $data;
        $content = $this->generateFile($this->_file, $this->_viewDatas);

        $contentStepper = null;
        if (file_exists($this->_fileStepper)){
            $contentStepper = $this->generateFile($this->_fileStepper, $this->_viewDatas);
        }

        $contentJs = null;
        if (file_exists($this->_fileJs)){
            $contentJs = $this->generateFile($this->_fileJs, $this->_viewDatas);
        }

        $contentCss = null;
        if (file_exists($this->_fileCss)){
            $contentCss = $this->generateFile($this->_fileCss, $this->_viewDatas);
        }

        // GENERATION DU CONTENU DU TEMPLATE
        $view = $this->generateFile(VIEWS."template.php", array('viewTitle' => $this->_viewTitle, 
                                                                'viewDatas' => $this->_viewDatas,
                                                                'content'   => $content,
                                                                'contentStepper'   => $contentStepper,
                                                                'contentJs'    => $contentJs,
                                                                'contentCss'    => $contentCss
                                                            ));
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