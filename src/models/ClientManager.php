<?php
//=================================================================
//                   CLASS MANAGER - CLIENT
//=================================================================
class ClientManager extends Model {

    public static function getNewInstance(){
        return new ClientManager('tclient', 'client', 'idClient');
    } 

    protected function getListPropertyTable(){
        $p = [ 'nom', 'prenom'];
         return $p;
    }

    public function addClient($data){
        $this->activeBddConnexion();
        $client = new Client($data);
        $this->add($client);
        $client->setIdClient(self::$_BddConnexion->lastInsertId()); 
        return $client;
    }

    // Retourne la fiche client à partir de l'IdClient du User connecté
    public function getClient($oUser){
        $client = null;
        if ($oUser){
            $this->activeBddConnexion();
            $client = $this->getFromId($oUser->idClient());
        }
        return $client;        
    }

    // Retourne la liste de tous les clients à partir d'un courtier
    public function getClientsCourtier($oCourtier){
        $this->activeBddConnexion();
        return $this->getAll();
    }

    public function getAllDevis($oClient){
        $this->activeBddConnexion();
        $devisManager = DevisManager::getNewInstance();
        return $devisManager->getAllDevis($oClient);
    }

    public function getAllContrats($oClient){
        return null;
        $this->activeBddConnexion();
        $contratManager = ContratManager::getNewInstance();
        return $contratManager->getAllContrats($oClient);
    }

    public function getAllSinistres($oClient){
        return null;

    }

    public function getContratsHabitations(){
    }

    public function getContratsVie(){
    }

    public function getContratsVoitures(){
    }
}

?>