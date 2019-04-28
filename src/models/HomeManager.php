<?php
require_once(MODELS.'WebSocketClient.php');

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

    // public function notifyServer(){
    //     $headers = ["Cookie: SID=".session_id()];
    //     $sp = websocket_open('ws://localhost:3000',3000,$headers,$errstr,16);
    //     if($sp){
    //        $bytes_written = websocket_write($sp,"hello server");
    //        if($bytes_written){
    //          $data = websocket_read($sp,$errstr);
    //          echo "Server responed with: " . $errstr ? $errstr : $data;
    //        }
    //     }   

    // }

}


?>



