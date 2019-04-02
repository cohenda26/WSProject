<?php

class HomeManager extends Model {

    public static function getNewInstance(){
        return new HomeManager('', '', '');
    } 
    
    public function getHome(){

    }

    public function getAssHabitation(){

    }

    public function getAssHypotheque(){

    }

    public function getAssVoiture(){

    }

    public function getAssVie(){

    }

    public function getAssSante(){

    }

    public function getAssVoyage(){
        
    }

    public function sendMail(){
        // L'expediteur du mail est renseigné au sein du fichier Sendmail.ini 
        $first_name = "David";
        $last_name = "COHEN";
        $email = "cohenda@free.fr";
        $other = "other";

        // Liste des destinataires
        $to = $email;

        // Sujet du mail
        $subject = "My Details";
        
        // Message du mail
        $message = "Tentative d'envoi de mail, votre nom  $first_name $last_name \n". 
        "Email : $email \n" . 
        "Other : $other";

        mail($to, $subject, $message);
    }
}

?>