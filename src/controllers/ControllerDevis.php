<?php

    class ControllerDevis Extends Controller{
        private $_clientManager;
        private $_devisManager;
        private $_view;

        // GESTION DES CONTRATS DE TYPE HABITATION
        public function getDevisHabitation($params){
            $currentUser = UserManager::getSessionUser();

            $this->_clientManager = ClientManager::getNewInstance();
            $client = $this->_clientManager->getClient($currentUser);

            $this->_devisManager = DevisManager::getNewInstance();
            $devis = $this->_devisManager->getDevis($params["id"]);

            $this->_view = new View("Devis/Habitation");
            $this->_view->generate(array("user" => $currentUser,
                                         "client" => $client, 
                                         "devis"=> $devis));
        }

        public function deleteDevisHabitation($params){
            $currentUser = UserManager::getSessionUser();

            $this->_clientManager = ClientManager::getNewInstance();
            $client = $this->_clientManager->getClient($currentUser);

            $this->_devisManager = DevisManager::getNewInstance();
            $devis = $this->_devisManager->deleteDevis($params["id"]);

            // $this->_view = new View("Client/DevisHabitation");
            // $this->_view->generate(array("user" => $currentUser,
            //                              "client" => $client, 
            //                              "devis"=> $devis));
        }

        public function demanderDevisHabitation($params){
            $currentUser = UserManager::getSessionUser();

            $this->_clientManager = ClientManager::getNewInstance();
            $client = $this->_clientManager->getClient($currentUser);

            $this->_devisManager = DevisManager::getNewInstance();
            $devis = $this->_devisManager->newDevis(null);

            $this->_view = new View("Devis/Habitation");
            $this->_view->generate(array("user"  => $currentUser,
                                         "client"=> $client,
                                         "devis" => $devis));
        }        

        public function validerDevisHabitation($params){
            $currentUser = UserManager::getSessionUser();

            $this->_clientManager = ClientManager::getNewInstance();
            $client = $this->_clientManager->getClient($currentUser);

            $this->_devisManager = DevisManager::getNewInstance();
            $devis = $this->_devisManager->addDevis($params, $client);

            $this->sendMailForHabitation($currentUser, $client, $devis);

            //$this->espacePersonnel($params);
            $ClientController = new ControllerClient ('ControllerClient', 'espacePersonnel', $params);
        }   


        public function sendMailForHabitation($currentUser, $client, $devis){
            // Source : https://css-tricks.com/sending-nice-html-email-with-php/

            $to = strip_tags($currentUser->email());
    
            $subject = 'Votre demande de devis habitation';
    
            $headers = "From: " . strip_tags("info@bitouel.com") . "\r\n";
            $headers .= "Reply-To: ". strip_tags("info@bitouel.com") . "\r\n";
            $headers .= "CC: cohenda26@gmail.com;david@bitouel.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    

            $message = '<html><body>';
            $message .= '<table width="151" height="142" cellspacing="2" cellpadding="2" border="0">';
            $message .= '<tbody>';
            $message .= '<tr align="center">';
            $message .= '<td valign="top"><img src="'. strip_tags("http://fs.webschool.academy/DAVID_COHEN/medic-logo.png") .'" alt="Bitouel Assurance" width="67" height="74"></td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<td valign="top"><img src="'. strip_tags("http://fs.webschool.academy/DAVID_COHEN/logo-dark-text.jpg") .'" alt="Bitouel Assurance name" width="149" height="50"></td>';
            $message .= '</tr>';
            $message .= '</tbody>';
            $message .= '</table>';
            $message .= '<br>';
            $message .= 'Mme / M. ' . strip_tags($client->nom()) .'<br>';
            $message .= 'Nous vous remercions de nous avoir adressé votre demande de devis.<br>';
            $message .= 'Nos prestataires reviendront vers vous dans les délais les plus brefs.<br>';
            $message .= '<br>';
            $message .= '<table width="70%" cellspacing="2" cellpadding="2" border="0">';
            $message .= '<tbody>';
            $message .= '<tr>';
            $message .= '<td rowspan="1" colspan="2" valign="top"><font color="#000066" size="+2"><b>RECAPITULATIF DE LA DEMANDE</b></font><br></td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<td valign="top"><font color="#3333ff">Type de demande</font><br></td>';
            $message .= '<td valign="top"><font color="#3333ff">Devis Assurance Habitation</font><br></td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<td valign="top"><font color="#3333ff">Adresse </font><br></td>';
            $message .= '<td valign="top">'. $devis->devisAdresseNum() . ' ' . $devis->devisAdresseRue() . ' ' . $devis->devisAdresseVille() .'<br></td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<td valign="top"><font color="#3333ff">Surface</font><br></td>';
            $message .= '<td valign="top">' . $devis->surface() . '<font color="#3333ff"> m²</font> <br></td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<td valign="top"><font color="#3333ff">Date d\'emenagement</font><br></td>';
            $message .= '<td valign="top">'. date_create($devis->dateAmenagementSouhaitee())->format('d M Y') .' <br></td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<td valign="top"><font color="#3333ff">Date de début de contrat souhaitée</font><br></td>';
            $message .= '<td valign="top">'. date_create($devis->dateDebutContratSouhaitee())->format('d M Y') . '<br></td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<td valign="top"><font color="#3333ff">Montant annuelle de cotisation</font><br></td>';
            $message .= '<td valign="top">de '. $devis->montantMinSouhaite() .' à '. $devis->montantMaxSouhaite() .' <br></td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<td valign="top"><br></td>';
            $message .= '<td valign="top"><br></td>';
            $message .= '</tr>';
            $message .= '</tbody>';
            $message .= '</table>';
            $message .= '<br>';
            $message .= '<br>';
            $message .= '&nbsp;&nbsp;&nbsp; Merci de votre confiance,<br>';
            $message .= '&nbsp;&nbsp;&nbsp; L\'équipe de Bitouel Assurance.<br>';
            $message .= '<a href="http://www.bitouel.com">http://www.bitouel.com</a><br>';
            $message .= '<br>';
            $message .= '</body> </html>';
    
            mail($to, $subject, $message, $headers);
    
        }


    }
?>